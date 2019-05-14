<?php

declare(strict_types = 1);

$user = [
    'Salis',
    'Jonas',
    'Jonaitis',
    '867559965',
    'Gatve',
];

print_r($user);
print_r($user['0'] . ' ' . $user[1]);

$user = [
    'country' => 'Salis',
    'firstName' => 'Jonas',
    'lastName' => 'Jonaitis',
    'phone' => '867559965',
    'address' => 'Gatve',
];

print_r($user);
print_r($user['firstName'] . ' ' . $user['lastName']);

$user = (object)[
    'firstName' => 'Jonas',
    'lastName' => 'Jonaitis',
    'phones' => [
        [
            'type' => 'own',
            'phone' => 245673567653,
        ],
        [
            'type' => 'work',
            'phone' => 2356437432,
        ],
    ],
];

$user->phones[-1] = (object)[
    'type' => 'some',
    'phone' => '11111111111111',
];

print_r($user);
print_r($user->phones[1]['phone']);

$string = "4543";
var_dump((double)$string);

print_r('kas: $string');
print_r("kas: $string");













