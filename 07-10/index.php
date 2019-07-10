<?php

declare(strict_types = 1);

use Products\Models\Category;
use Products\Models\Product;

require_once (__DIR__.'/vendor/autoload.php');

$productModel = new Product();
$categoryClass = new Category();

$products = $productModel->find(4);
$categories = $categoryClass->get();

?>
<pre>

<?php
var_dump($products);

print_r($categories);
?>

</pre>
