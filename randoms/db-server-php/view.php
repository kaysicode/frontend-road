<?php
include 'getproducts.php'; // this outputs $products as JSON
?>
<!DOCTYPE html>
<html>

<head>
    <title>Device List</title>
</head>

<body>
    <h2>Available Products</h2>
    <ul>
        <?php foreach ($products as $item): ?>
            <li><?= $item->name ?> - $<?= $item->price ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>