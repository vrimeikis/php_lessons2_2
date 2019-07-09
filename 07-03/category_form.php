<?php

declare(strict_types = 1);

require_once (__DIR__.'/db.php');

$formData = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['category_id']) && $_GET['category_id'] > 0) {
    $categoryId = $_GET['category_id'];

    $sql = 'SELECT * FROM categories WHERE id = :id';

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $categoryId, PDO::PARAM_INT);
    $stmt->execute();
    $formData = $stmt->fetch();

    if (empty($formData)) {
        echo 'Data not found for edit';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_category']))
{
    $postData = $_POST;

    if (isset($postData['id']) && $postData['id'] > 0)
    {
        try {
            $sql = 'UPDATE categories SET title = :title, slug = :slug WHERE id = :id';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':title', $postData['title'], PDO::PARAM_STR);
            $stmt->bindValue(':slug', $postData['slug'], PDO::PARAM_STR);
            $stmt->bindValue(':id', $postData['id'], PDO::PARAM_INT);
            $stmt->execute();

            header('Location: category.php');
        } catch (Exception $exception) {
            echo $exception->getMessage();
            $formData = $postData;
        }

    } else {
        try {
            $sql = 'INSERT INTO categories SET title = :title, slug = :slug';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':title', $postData['title'], PDO::PARAM_STR);
            $stmt->bindValue(':slug', $postData['slug'], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $exception) {
            echo $exception->getMessage();
            $formData = $postData;
        }
    }

    if ($conn->lastInsertId() > 0) {
        header('Location: category.php');
    }
}

?>

<h3><?= isset($formData['id']) ? 'Edit' : 'New'; ?> category form</h3>
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
    <input id="title" type="text" name="title" value="<?= isset($formData['title']) ? $formData['title'] : null; ?>">
    <br>

    <label for="slug">Slug</label>
    <br>
    <input id="slug" type="text" name="slug" value="<?= isset($formData['slug']) ? $formData['slug'] : null; ?>">
    <br>

    <input type="submit" name="save_category" value="Save">

</form>