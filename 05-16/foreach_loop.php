<?php

declare(strict_types = 1);

$array = [
    0 => 'pirmas',
    'zmogus' => 'antras',
    1 => 'trecias',
];

foreach ($array as $key => $name) {
    if ($key === 'zmogus') {
        break;
    }
    echo $key . ': ' . $name . '|';
}