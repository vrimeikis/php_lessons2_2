<?php

declare(strict_types = 1);


$fruits = [
    'Banana',
    'apple_fruit' => 'Apple',
    'Ananasssss',
];

$stringFruits = '';
foreach ($fruits as $fruit) {
    $stringFruits .= $fruit . ', ';
}

echo $stringFruits;

echo '<br>';

$implode = implode(', ', $fruits);
echo $implode;

echo '<pre>';

print_r(explode(', ', $stringFruits));

print_r(explode(', ', $implode));

echo '</pre>';