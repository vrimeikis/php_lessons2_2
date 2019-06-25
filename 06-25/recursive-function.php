<?php

declare(strict_types = 1);

$menu = [
    [
        'title' => 'Home',
        'link' => '',
    ],
    [
        'title' => 'Products',
        'link' => 'products',
        'submenu' => [
            [
                'title' => 'Naujausi',
                'link' => 'newest',
            ],
            [
                'title' => 'Perkamiausi',
                'link' => 'most-sell',
                'submenu' => [
                    [
                        'title' => 'Kepures',
                        'link' => 'kepures',
                    ]
                ]
            ],
            [
                'title' => 'Ispardavimas',
                'link' => 'sold',
            ],
        ],
    ],
    [
        'title' => 'About us',
        'link' => 'about-as',
    ],
    [
        'title' => 'Contacts',
        'link' => 'contacts',
    ],
    [
        'title' => 'Data',
        'link' => 'data.php',
    ],
];

function makeMenu(array $menu): ?string
{
    if (empty($menu)) {
        return null;
    }

    $menuString = '';

    $menuString .= '<ul>';

    foreach ($menu as $item) {
        if (!isset($item['link']) || !isset($item['title'])) {
            continue;
        }

        $menuString .= '<li>';
        $menuString .= '<a href="' . $item['link'] . '">' . $item['title'] . '</a>';

        if (isset($item['submenu'])) {
            $menuString .= makeMenu($item['submenu']);
        }

        $menuString .= '</li>';
    }

    $menuString .= '</ul>';

    return $menuString;
}

echo makeMenu($menu);