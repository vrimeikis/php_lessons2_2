<?php

declare(strict_types = 1);

$data = [

    7 => [
        'brand' => 'Audi',
        'model' => 'A3',
        'year' => '1997',
        'color' => 'blue',
    ],
    'auto2' => [
        'year' => '1996',
        'model' => 'A4',
        'color' => 'red',
        'brand' => 'Audi',
    ],
    90 => [
        'brand' => 'BMW',
        'year' => '1997',
        'model' => '320',
        'color' => 'black',
    ],
];

echo '<table border="1">';

echo '<tr>';

echo '<th>Marke</th>';
echo '<th>Modelis</th>';
echo '<th>Metai</th>';
echo '<th>Spalva</th>';

echo '</tr>';

$i = 0;
foreach ($data as $index => $auto) {
//    if ($i >= 1) {
//        break;
//    }

    echo '<tr>';

    echo '<td>' . $auto['brand'] . '</td>';
    echo '<td>' . $auto['model'] . '</td>';
    echo '<td>' . $auto['year'] . '</td>';
    echo '<td>' . $auto['color'] . '</td>';

    echo '</tr>';
    $i++;
}

echo '</table>';


echo '<br>';


/**
 * Autos in row
 */
echo '<table border="1">';

echo '<tr>';
echo '<th>Auto in row</th>';
echo '</tr>';

$i = 0;
$j = 0;
$count = count($data); // 3
foreach ($data as $auto) {
    if ($i == 0) {
        echo '<tr>';
        echo '<td>';
    }

    echo $auto['brand'];

    $i++;
    $j++;
    if ($i == 2 || $j >= $count) {
        echo '</td>';
        echo '</tr>';
        $i = 0;
    }
}

echo '</table>';
