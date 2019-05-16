<?php

declare(strict_types = 1);

$type = 'two';

$number = 0;

if ($type == 'one'){
    $number = 1;
} elseif ($type == 'two') {
    $number = 2;
} elseif ($type == 'three') {
    $number = 3;
} elseif ($type == 'four') {
    $number = 4;
}

switch ($type) {
    case 'one':
        return 1;
    case 'two':
    case 'three':
        $number = 3;
        break;
    case 'four':
        $number = 4;
        break;
    default:
        $number = 0;
}