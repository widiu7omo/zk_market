<?php

return [
    'name' => 'Zona Kopi Delivery',
    'manifest' => [
        'name' => env('APP_NAME', 'My PWA App'),
        'short_name' => 'Zona Kopi Delivery',
        'start_url' => '/',
        'background_color' => '#B09685',
        'theme_color' => '#d1d1d1',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/icon-72x72.png',
                'purpose' => 'any maskable'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-96x96.png',
                'purpose' => 'any maskable'
            ],
            '128x128' => [
                'path' => '/images/icons/icon-128x128.png',
                'purpose' => 'any maskable'
            ],
            '144x144' => [
                'path' => '/images/icons/icon-144x144.png',
                'purpose' => 'any maskable'
            ],
            '152x152' => [
                'path' => '/images/icons/icon-152x152.png',
                'purpose' => 'any maskable'
            ],
            '192x192' => [
                'path' => '/images/icons/icon-192x192.png',
                'purpose' => 'any maskable'
            ],
            '384x384' => [
                'path' => '/images/icons/icon-384x384.png',
                'purpose' => 'any maskable'
            ],
            '512x512' => [
                'path' => '/images/icons/icon-512x512.png',
                'purpose' => 'any maskable'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/splash/640x1136.png',
            '750x1334' => '/images/splash/750x1334.png',
            '828x1792' => '/images/splash/828x1792.png',
            '1125x2436' => '/images/splash/1125x2436.png',
            '1242x2208' => '/images/splash/1242x2208.png',
            '1242x2688' => '/images/splash/1242x2688.png',
            '1536x2048' => '/images/splash/1536x2048.png',
            '1668x2224' => '/images/splash/1668x2224.png',
            '1668x2388' => '/images/splash/1668x2388.png',
            '2048x2732' => '/images/splash/2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
