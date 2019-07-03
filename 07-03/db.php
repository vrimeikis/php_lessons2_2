<?php

declare(strict_types = 1);

$dbHost = 'localhost';
$dbPort = 3306;
$dbName = 'test_database';
$dbUser = 'test_user';
$dbPassword = 'testpass';
$dbCharset = 'utf8';

$dsn = "mysql:host=$dbHost;port=$dbPort;dbname=$dbName;charset=$dbCharset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $conn = new PDO($dsn, $dbUser, $dbPassword, $options);
} catch (PDOException $exception) {
    throw new PDOException($exception->getMessage(), $exception->getCode());
}