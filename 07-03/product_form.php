<?php

declare(strict_types = 1);

require_once(__DIR__ . '/db.php');
require_once(__DIR__.'/query_functions.php');

$formData = [
    'categories' => [],
];

$categories = getAllCategories($conn, ['id', 'title']);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['product_id']) && $_GET['product_id'] > 0) {
    $productId = $_GET['product_id'];

    $formData = getProductWithCategoryIdsById($conn, $productId);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_data'])) {
    $postData = $_POST;

    if (isset($postData['id']) && $postData['id'] > 0) {
        try {
            updateProduct($conn, $postData);
            deleteCategoryPivotByProductId($conn, $postData['id']);

            if (isset($postData['categories']) && !empty($postData['categories'])) {
                foreach ($postData['categories'] as $categoryId) {
                    insertCategoryPivot($conn, (int)$postData['id'], (int)$categoryId);
                }
            }

            header("Location: product.php");

        } catch (Exception $exception) {
            echo $exception->getMessage();
            $formData = $postData;
        }
    } else {
        try {
            $productId = insertProduct($conn, $postData);

            if ($productId > 0) {
                if (isset($postData['categories']) && !empty($postData['categories'])) {
                    foreach ($postData['categories'] as $categoryId) {
                        insertCategoryPivot($conn, $productId, (int)$categoryId);
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
                <?= in_array($category['id'], $formData['categories']) ? 'checked="checked"' : '' ?>
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