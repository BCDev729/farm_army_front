<?php

namespace App\Controller;

use App\Pools\FarmPools;
use App\Repository\PlatformRepository;
use App\Utils\Web3Util;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private $platformRepository;

    public function __construct(PlatformRepository $platformRepository)
    {
        $this->platformRepository = $platformRepository;
    }

    /**
     * @Route("/theme", name="theme_toggle", methods={"POST"})
     */
    public function theme(Request $request): Response
    {
        $response = new Response();

        $theme = $request->get('theme', 'light');

        $response->headers->setCookie(new Cookie('theme', $theme, date_create()->modify('+180 days')));

        return $response;
    }

    /**
     * @Route("/farms.json", methods={"GET"})
     */
    public function farms(FarmPools $farmPools): JsonResponse
    {
        $response = new JsonResponse([
            'farms' => $farmPools->generateContent(),
            'platforms' => $this->platformRepository->getPlatforms(),
        ]);

        $response->setPublic();
        $response->setMaxAge(60 * 30);

        return $response;
    }

    /**
     * @Route("/", name="frontpage", methods={"GET"})
     */
    public function index(Request $request)
    {
        $platforms = $this->platformRepository->getPlatforms();

        $parameters = [
            'platforms' => $platforms,
            'providers' => $this->platformRepository->getPlatforms(),
        ];

        if ($chainAddress = $request->cookies->get('chain_address')) {
            $parameters['chain_address'] = $chainAddress;
        }

        $response = new Response();
        $response->setPublic();
        $response->setMaxAge(60 * 30);

        return $this->render('frontpage/frontpage.html.twig', $parameters, $response);
    }

    /**
     * @Route("/", methods={"POST"})
     */
    public function post(Request $request) {
        if (($address = $request->request->get('chain_address')) && Web3Util::isAddress($address)) {
            $response = new RedirectResponse($this->generateUrl('app_farm_index', ['address' => substr($address, 2)]));

            $response->headers->setCookie(new Cookie('chain_address', $address, date_create()->modify('+ 180 days')));

            return $response;
        }

        $platforms = $this->platformRepository->getPlatforms();

        return $this->render('frontpage/frontpage.html.twig', [
            'invalid' =>  true,
            'platforms' => $platforms,
            'chain_address' => $address ?? '',
            'providers' => $platforms,
        ]);
    }

    /**
     * @Route("/sitemap.xml", name="sitemap", methods={"GET"})
     */
    public function sitemap(): Response
    {
        $response = new Response($this->renderView('seo/sitemap.xml.twig'), 200, [
            'Content-type' => ' text/xml; charset=utf-8'
        ]);

        $response->setPublic();
        $response->setMaxAge(60 * 30);

        return $response;
    }
}