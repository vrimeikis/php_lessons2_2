<?php

declare(strict_types = 1);

require_once(__DIR__ . '/db.php');

$formData = [
        'categories' => [],
];

$sql = 'SELECT id, title FROM categories';

$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['product_id']) && $_GET['product_id'] > 0) {
    $productId = $_GET['product_id'];

    $sql = 'SELECT p.*, GROUP_CONCAT(pc.category_id) AS categories
        FROM products p
        LEFT JOIN product_categories pc ON p.id = pc.product_id
        WHERE p.id= :productId
        GROUP BY p.id';

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $formData = $stmt->fetch();

    $formData['categories'] = $formData['categories'] ? explode(',', $formData['categories']) : [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_data'])) {
    $postData = $_POST;

    if (isset($postData['id']) && $postData['id'] > 0) {
        try {
            $sql = 'UPDATE products SET title= :title, slug= :slug, description= :description, price= :price WHERE id=:id';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':title', $postData['title'], PDO::PARAM_STR);
            $stmt->bindValue(':slug', $postData['slug'], PDO::PARAM_STR);
            $stmt->bindValue(':description', $postData['description'], PDO::PARAM_STR);
            $stmt->bindValue(':price', $postData['price'], PDO::PARAM_INT);
            $stmt->bindValue(':id', $postData['id'], PDO::PARAM_INT);
            $stmt->execute();

            $sql = 'DELETE FROM product_categories WHERE product_id = :productId';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':productId', $postData['id'], PDO::PARAM_INT);
            $stmt->execute();

            if (isset($postData['categories']) && !empty($postData['categories'])) {

                $sql = 'INSERT INTO product_categories SET category_id = :categoryId, product_id = :productId';
                foreach ($postData['categories'] as $categoryId) {
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':productId', $postData['id'], PDO::PARAM_INT);
                    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
                    $stmt->execute();
                }
            }

            header("Location: product.php");

        } catch (Exception $exception) {
            echo $exception->getMessage();
            $formData = $postData;
        }
    } else {

        try {
            $sql = 'INSERT INTO products SET title= :title, slug= :slug, description= :description, price= :price';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':title', $postData['title'], PDO::PARAM_STR);
            $stmt->bindValue(':slug', $postData['slug'], PDO::PARAM_STR);
            $stmt->bindValue(':description', $postData['description'], PDO::PARAM_STR);
            $stmt->bindValue(':price', $postData['price'], PDO::PARAM_INT);
            $stmt->execute();

            $productId = $conn->lastInsertId();

            if ($productId > 0) {

                if (isset($postData['categories']) && !empty($postData['categories'])) {

                    $sql = 'INSERT INTO product_categories SET category_id = :categoryId, product_id = :productId';
                    foreach ($postData['categories'] as $categoryId) {
                        $stmt = $conn->prepare($sql);
                        $stmt->bindValue(':productId', $productId, PDO::PARAM_INT);
                        $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT);
                        $stmt->execute();
                    }
                }

                header("Location: product.php");
            }

        } catch (Exception $exception) {
            echo $exception->getMessage();
            $formData = $postData;
        }

    }
}

?>

<h3><?= isset($formData['id']) ? 'Edit' : 'New'; ?> product form</h3>
<br>
<br>

<form action="" method="POST">

    <?php

    if (isset($formData['id'])) {
        ?>

        <input type="hidden" name="id" value="<?= $formData['id']; ?>">

        <?php
    }

    ?>

    <label for="title">Title</label>
    <br>
    <input id="title" type="text" name="title" value="<?= isset($formData['title']) ? $formData['title'] : '' ?>"
           required>

    <br>
    <label for="slug">Slug</label>
    <br>
    <input id="slug" type="text" name="slug" value="<?= isset($formData['slug']) ? $formData['slug'] : '' ?>" required>

    <br>
    <label for="description">Description</label>
    <br>
    <textarea id="description" name="description">
        <?= isset($formData['description']) ? $formData['description'] : '' ?>
    </textarea>

    <br>
    <label for="categories">Categories</label>
    <fieldset>
        <?php

        foreach ($categories as $category) {
            ?>

            <input id="categories"
                   type="checkbox"
                   name="categories[]"
                   value="<?= $category['id']; ?>"
                <?= in_array($category['id'], $formData['categories']) ? 'checked="checked"' : ''?>
            >
            <?= $category['title']; ?>
            <br>

            <?php
        }

        ?>
    </fieldset>

    <br>
    <label for="price">Price</label>
    <br>
    <input id="price" type="number" name="price" value="<?= isset($formData['price']) ? $formData['price'] : 0 ?>"
           step="0.01" min="0" required>

    <br>
    <br>
    <input type="submit" name="save_data" value="Save">

</form>