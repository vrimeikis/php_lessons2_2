<?php

declare(strict_types = 1);

function insertProduct(PDO $conn, array $postData): int
{
    $sql = 'INSERT INTO products SET title= :title, slug= :slug, description= :description, price= :price';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':title', $postData['title'], PDO::PARAM_STR);
    $stmt->bindValue(':slug', $postData['slug'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $postData['description'], PDO::PARAM_STR);
    $stmt->bindValue(':price', $postData['price'], PDO::PARAM_INT);
    $stmt->execute();

    return (int)$conn->lastInsertId();
}

function updateProduct(PDO $conn, array $postData)
{
    $sql = 'UPDATE products SET title= :title, slug= :slug, description= :description, price= :price WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':title', $postData['title'], PDO::PARAM_STR);
    $stmt->bindValue(':slug', $postData['slug'], PDO::PARAM_STR);
    $stmt->bindValue(':description', $postData['description'], PDO::PARAM_STR);
    $stmt->bindValue(':price', $postData['price'], PDO::PARAM_INT);
    $stmt->bindValue(':id', $postData['id'], PDO::PARAM_INT);
    $stmt->execute();
}

function deleteCategoryPivotByProductId(PDO $conn, $productId)
{
    $sql = 'DELETE FROM product_categories WHERE product_id = :productId';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
}

function insertCategoryPivot(PDO $conn, int $productId, int $categoryId)
{
    $sql = 'INSERT INTO product_categories SET category_id = :categoryId, product_id = :productId';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
    $stmt->execute();
}

function getAllCategories(PDO $conn, array $column = ['*']): array
{
    $sql = 'SELECT '.implode(', ', $column).' FROM categories';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getProductWithCategoryIdsById(PDO $conn, $productId): array
{
    $sql = 'SELECT p.*, GROUP_CONCAT(pc.category_id) AS categories
        FROM products p
        LEFT JOIN product_categories pc ON p.id = pc.product_id
        WHERE p.id= :productId
        GROUP BY p.id';

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch();

    $data['categories'] = $data['categories'] ? explode(',', $data['categories']) : [];

    return $data;
}