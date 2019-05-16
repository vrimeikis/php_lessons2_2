<?php

declare(strict_types = 1);

/**
 * Use foreach and collect from all autos
 * all: seats and colors in different arrays
 * and print_r
 *
 * Expect result:
 *  [4, 2, 5]
 *  ['blue', 'red', 'blue']
 */
$autos = [
    [
        'name' => 'audi',
        'model' => 'a3',
        'parameters' => [
            'color' => 'blue',
            'seats' => 4,
        ],
    ],
    [
        'name' => 'audi',
        'model' => 'a4',
        'parameters' => [
            'color' => 'red',
            'seats' => 2,
        ],
    ],
    [
        'name' => 'bmw',
        'model' => '320',
        'parameters' => [
            'color' => 'blue',
            'seats' => 5,
        ],
    ],
];

$seats = [];
$colors = [];

foreach ($autos as $auto) {
    foreach ($auto['parameters'] as $key => $value) {
        if ($key === 'color') {
            $colors[] = $value;
        }

        if ($key === 'seats') {
            $seats[] = $value;
        }
    }
}

echo '--- Colors ---';

print_r($colors);

echo '--- Seats ---';

print_r($seats);

$newAutos = [];

foreach ($autos as $auto) {
    $auto['full_name'] = $auto['name'] . ' ' . $auto['model'];
    $newAutos[] = $auto;
}

print_r($newAutos);

/**
 * SWITCH CASE example
 */

number_format(6.45747433, 1, '.', ',');

M_PI;

const TYPE_SEB = 'seb';
const TYPE_SWED = 'swed';
const TYPE_DNB = 'dnb';
const TYPE_CITADELE = 'citadele';
const TYPE_PAYPAL = 'paypal';

$bankType = TYPE_SEB;

switch ($bankType) {
    case TYPE_SWED:
        $bankName = 'SwedBank';
        break;
    case TYPE_SEB:
        $bankName = 'SEB';
        break;
    case TYPE_DNB:
        $bankName = 'DNB Bank';
        break;
    case TYPE_CITADELE:
        $bankName = 'Citadele AS';
        break;
    case TYPE_PAYPAL:
        $bankName = '';
}

echo $bankName;