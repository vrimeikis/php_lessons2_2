<?php

declare(strict_types = 1);

$array = [
    'pirmas',
    'antras',
    'trecias',
];


$count = count($array);

for ($i = 0; $i < $count; $i++) {
    echo $array[$i] . ' - ';
}

for ($i = $count - 1; $i >= 0; $i--) {
    echo $array[$i] . ' - ';
}