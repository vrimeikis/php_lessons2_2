<?php

declare(strict_types = 1);

include_once __DIR__.'/Product.php';
//include_once __DIR__.'/Category.php';

$productClass = new Product(1);

var_dump($productClass);
//$productClass->setTitle('Product 1')
//    ->setSlug('product-1')
//    ->setPrice(6.99)
//    ->save();
//
//
//var_dump($productClass);


