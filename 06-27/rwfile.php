<?php

declare(strict_types = 1);


/**
 * file_put_contents($filename, $data);
 * file_get_contents($filename);
 */

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

$fileName = __DIR__.'/jsonData.json';
$jsonData = json_encode($menu, JSON_PRETTY_PRINT);

$start = microtime(true);

file_put_contents($fileName, $jsonData);

chmod($fileName, 0777);

$dataFromFile = file_get_contents($fileName);

echo microtime(true) - $start;

$parsedData = json_decode($dataFromFile, true);

echo '<pre>';
foreach ($parsedData as $item) {
    print_r($item);
}
echo '</pre>';
















