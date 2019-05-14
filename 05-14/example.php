<?php

declare(strict_types = 1);

/**
 * Array
 *
 * Display all element title attribute
 */
$menu = [
    0 => [
        'title' => 'title1',
        'slug' => 'title-1',
    ],
    1 => [
        'title' => 'title2',
        'slug' => 'title-2',
    ],
    2 => [
        'title' => 'title3',
        'slug' => 'title-3',
    ],
];

echo $menu[0]['title'];
echo $menu[1]['title'];
echo $menu[2]['title'];

/**
 * Sum
 */
$numbers = [34, 56, 86, 34, 567];

$sum = $numbers[0] + $numbers[1] + $numbers[2] + $numbers[3];
$arraySum = array_sum($numbers);

$points = [
    0 => [
        'seria' => 'First',
        'points' => 34
    ],
    1 => [
        'seria' => 'Second',
        'points' => 32
    ],
    2 => [
        'seria' => 'Third',
        'points' => 36
    ],
    3 => [
        'seria' => 'Forth',
        'points' => 50
    ],
];

$sum = $numbers[0]['points'] + $numbers[1]['points'] + $numbers[2]['points'] + $numbers[3]['points'];

$exPoints = array_column($points, 'points');
$sum = array_sum($exPoints);

$sum = array_sum(array_column($points, 'points'));

$v = array_values($points);

$c = count($points);
$points[$c - 1];

$lastKey = array_key_last($points);
$points[$lastKey];


















