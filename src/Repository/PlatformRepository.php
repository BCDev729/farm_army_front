<?php

namespace App\Repository;

class PlatformRepository
{
    public function getPlatform(string $id): array
    {
        foreach($this->getPlatforms() as $platform) {
            if ($platform['id'] === $id) {
                return $platform;
            }
        }

        throw new \InvalidArgumentException();
    }

    /**
     * @return \string[][]
     */
    public function getPlatforms(): array
    {
        return [
            [
                'id' => 'autofarm',
                'label' => 'Autofarm',
                'url' => 'https://beta.autofarm.network/',
                'icon' => '/assets/platforms/auto.png',
                'token' => 'auto',
            ],
            [
                'id' => 'beefy',
                'label' => 'Beefy',
                'url' => 'https://app.beefy.finance',
                'icon' => '/assets/platforms/beefy.png',
                'token' => 'bifi',
            ],
            [
                'id' => 'pancakebunny',
                'label' => 'Bunny',
                'url' => 'https://pancakebunny.finance/',
                'icon' => '/assets/platforms/pancakebunny.png',
                'token' => 'bunny',
            ],
            [
                'id' => 'pancake',
                'label' => 'Pancake',
                'url' => 'https://pancakeswap.finance/',
                'icon' => '/assets/platforms/pancake.png',
                'token' => 'cake',
            ],
            [
                'id' => 'jetfuel',
                'label' => 'Jetfuel',
                'url' => 'https://jetfuel.finance/',
                'icon' => '/assets/platforms/jetfuel.png',
                'token' => 'fuel',
            ],
            [
                'id' => 'acryptos',
                'label' => 'ACryptoS',
                'url' => 'https://app.acryptos.com/',
                'icon' => '/assets/platforms/acryptos.png',
                'token' => 'acs',
                'tokens' => ['acs', 'acsi'],
            ],
            [
                'id' => 'bakery',
                'label' => 'Bakery',
                'url' => 'https://www.bakeryswap.org/',
                'icon' => '/assets/platforms/bakery.png',
                'token' => 'bake',
            ],
            [
                'id' => 'goose',
                'label' => 'Goose',
                'url' => 'https://www.goosedefi.com/',
                'icon' => '/assets/platforms/goose.png',
                'token' => 'egg',
            ],
            [
                'id' => 'kebab',
                'label' => 'Kebab',
                'url' => 'https://kebabfinance.com',
                'icon' => '/assets/platforms/kebab.png',
                'token' => 'kebab',
            ],
            [
                'id' => 'bearn',
                'label' => 'bEarn.Fi',
                'url' => 'https://bearn.fi/',
                'icon' => '/assets/platforms/bearn.png',
                'token' => 'bfi',
            ],
            [
                'id' => 'bdollar',
                'label' => 'bDollar',
                'url' => 'https://bdollar.fi/',
                'icon' => '/assets/platforms/bdollar.png',
                'token' => 'bdo',
            ],
            [
                'id' => 'valuedefi',
                'label' => 'ValueDefi',
                'url' => 'https://bsc.valuedefi.io/#/vfarm',
                'icon' => '/assets/platforms/valuedefi.png',
                'token' => 'vbswap',
            ],
            [
                'id' => 'saltswap',
                'label' => 'SaltSwap',
                'url' => 'https://www.saltswap.finance/',
                'icon' => '/assets/platforms/saltswap.png',
                'token' => 'salt',
            ],
            [
                'id' => 'hyperjump',
                'label' => 'HyperJump',
                'url' => 'https://farm.hyperjump.fi/',
                'icon' => '/assets/platforms/hyperjump.png',
                'token' => 'alloy',
            ],
            [
                'id' => 'apeswap',
                'label' => 'ApeSwap',
                'url' => 'https://apeswap.finance/',
                'icon' => '/assets/platforms/apeswap.png',
                'token' => 'banana',
            ],
            [
                'id' => 'slime',
                'label' => 'Slime',
                'url' => 'https://slime.finance/',
                'icon' => '/assets/platforms/slime.png',
                'token' => 'slme',
            ],
            [
                'id' => 'jul',
                'label' => 'JulSwap',
                'url' => 'https://info.julswap.com/',
                'icon' => '/assets/platforms/jul.png',
                'token' => 'juld',
            ],
            [
                'id' => 'space',
                'label' => 'farm.space',
                'url' => 'https://farm.space/',
                'icon' => '/assets/platforms/space.png',
                'token' => 'space',
            ],
            [
                'id' => 'blizzard',
                'label' => 'Blizzard Money',
                'url' => 'https://www.blizzard.money/',
                'icon' => '/assets/platforms/blizzard.png',
                'token' => 'blzd',
            ],
            [
                'id' => 'wault',
                'label' => 'Wault Finance',
                'url' => 'https://app.wault.finance/',
                'icon' => '/assets/platforms/wault.png',
                'token' => 'wault',
            ],
            [
                'id' => 'alpaca',
                'label' => 'Alpaca Finance',
                'url' => 'https://app.alpacafinance.org/',
                'icon' => '/assets/platforms/alpaca.png',
                'token' => 'alpaca',
            ],
            [
                'id' => 'alpha',
                'label' => 'Alpha',
                'url' => 'https://homora-bsc.alphafinance.io/',
                'icon' => '/assets/platforms/alpha.png',
                'token' => 'alpha',
            ],
        ];
    }
}