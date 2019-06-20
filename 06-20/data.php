<?php

/**
 * Data array
 */
$array = [
    [
        'time' => 1561045771,
        'price' => 2.45,
    ],
    [
        'time' => 1561045781,
        'price' => 2.46,
    ],
    [
        'time' => 1561046791,
        'price' => 2.47,
    ],
    [
        'time' => 1561046792,
        'price' => 2.43,
    ],
    [
        'time' => 1561046795,
        'price' => 2.25,
    ],
    [
        'time' => 1561046799,
        'price' => 2.23,
    ],
    [
        'time' => 1561046822,
        'price' => 2.46,
    ],
];

/**
 * Rasti didziausia kaina pagal intervala jei intervalu reiksmes null,
 * tada skaiciuoti is viso masyvo.
 */

$fromTimestamp = 1561046792;
$toTimestamp = 1561046799;

$prices = [];
$maxPrice = null;
foreach ($array as $point) {
    $add = true;

    if ($fromTimestamp !== null && $point['time'] < $fromTimestamp) {
        $add = false;
    }

    if ($toTimestamp !== null && $point['time'] > $toTimestamp) {
        $add = false;
    }

    if ($add === true) {
        $prices[] = $point['price'];
    }
}

if (!empty($prices)) {
    $maxPrice = max($prices);
}

echo $maxPrice;
echo '<br />';
/**
 * ++++++++++++++++++++++++++++++++
 */

$timestamp = 1561046792;
$step = 60;

$roundedTimestamp = (int)(floor($timestamp / $step) * $step);

echo $roundedTimestamp;

echo '<br/>';
echo '<br/>';

$groupedData = [];
foreach ($array as $point) {
    $roundedTimestamp = (int)(floor($point['time'] / $step) * $step);

    $groupedData[$roundedTimestamp][] = $point['price'];
}

echo '<pre>';
print_r($groupedData);
echo '</pre>';

foreach ($groupedData as &$point) {
    $point = round(array_sum($point) / count($point), 2);
}

echo '<pre>';
print_r($groupedData);
echo '</pre>';

foreach ($array as $key => &$point) {
    $point['name'] = 'Point: '.$key;
}

echo '<pre>';
print_r($array);
echo '</pre>';






