<?php

declare(strict_types = 1);

require_once (__DIR__.'/db.php');

$sql = 'SELECT * FROM products';

$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();

?>
<a href="product_form.php">New</a>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>

<?php

foreach ($products as $product) {
    ?>

    <tr>
        <td><?= $product['id']; ?></td>
        <td><?= $product['title']; ?></td>
        <td><?= $product['price']; ?></td>
        <td>
            <a href="product_form.php?product_id=<?= $product['id']; ?>">Edit</a>
            <form action="product_delete.php" method="POST">
                <input type="hidden" name="deleteId" value="<?= $product['id']; ?>">
                <input type="submit" onclick="return confirm('Do you realy want to delete: <?= $product['title'] ?>?');" name="delete_product" value="Delete">
            </form>
        </td>
    </tr>

    <?php
}

?>

</table>
