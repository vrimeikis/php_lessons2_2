<?php

declare(strict_types = 1);

/**
 * ND: 1
 * Parasyti skriptuka naudojant foreach cikla,
 * kuris is $menu duomenu isvestu tik active = true
 */

$menu = [
    [
        'title' => 'Home',
        'link' => '',
        'active' => true,
    ],
    [
        'title' => 'Products',
        'link' => 'products',
        'active' => true,
        'submenu' => [
            [
                'title' => 'Naujausi',
                'link' => 'newest',
                'active' => true,
            ],
            [
                'title' => 'Perkamiausi',
                'link' => 'most-sell',
                'active' => true,
            ],
            [
                'title' => 'Ispardavimas',
                'link' => 'sold',
                'active' => true,
            ],
        ],
    ],
    [
        'title' => 'About us',
        'link' => 'about-as',
        'active' => false,
    ],
    [
        'title' => 'Contacts',
        'link' => 'contacts',
        'active' => true,
    ],
    [
        'title' => 'Data',
        'link' => 'data.php',
        'active' => true,
    ],
];

/**
 * ND: 2
 * Parasyti skriptuka naudojant foreach cikla,
 * Kuris i lentale isvestu tik melynos spalvos automobilius
 */

$autos = [
    [
        'brand' => 'Audi',
        'model' => 'A3',
        'year' => '1997',
        'color' => 'blue',
    ],
    [
        'year' => '1996',
        'model' => 'A4',
        'color' => 'red',
        'brand' => 'Audi',
    ],
    [
        'brand' => 'BMW',
        'year' => '1997',
        'model' => '320',
        'color' => 'black',
    ],
];