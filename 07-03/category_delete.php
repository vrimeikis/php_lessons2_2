<?php

declare(strict_types = 1);

require_once (__DIR__.'/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_category_id']) && isset($_POST['category_delete']))
{
    try {
        $sql = 'DELETE FROM categories WHERE id = :id';

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_POST['delete_category_id'], PDO::PARAM_INT);
        $stmt->execute();

        header('Location: category.php');

    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}