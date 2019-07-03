<?php

declare(strict_types = 1);

require_once (__DIR__.'/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_product'])) {
    $productId = $_POST['deleteId'];

    try {
        $sql = 'DELETE FROM products WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $productId, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $exception) {
        echo $exception->getMessage();
        exit();
    }

    header('Location: product.php');
}