<?php

declare(strict_types = 1);

require_once (__DIR__.'/db.php');

$sql = 'SELECT * FROM categories';

$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll();
?>

<a href="category_form.php">New</a>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Actions</th>
    </tr>

    <?php

    foreach ($categories as $category) {
        ?>

        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= $category['title'] ?></td>
            <td><?= $category['slug'] ?></td>
            <td>
                <a href="category_form.php?category_id=<?= $category['id'] ?>">Edit</a>
                <br>
                <form action="category_delete.php" method="POST">
                    <input type="hidden" name="delete_category_id" value="<?= $category['id'] ?>">
                    <input type="submit" onclick="return confirm('Delete category: <?= $category['title'] ?>?')" name="category_delete" value="Delete">
                </form>
            </td>
        </tr>

        <?php
    }

    ?>

</table>

