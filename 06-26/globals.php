<?php

declare(strict_types = 1);

session_start();

echo '<pre>';

$variables = [
    $GLOBALS,
    $_SERVER,
    $_GET,
    $_POST,
    $_FILES,
    $_COOKIE,
    $_SESSION,
    $_REQUEST,
    $_ENV,
];

foreach ($variables as $variable) {
    print_r($variable);
}

echo '</pre>';