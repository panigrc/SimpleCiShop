<ul>
<?php
    $price = 0;
    foreach($products as $product) {
        $price += $product['price_' . $user['language']] * $product['quantity'];
?>
<li><?= $product['title_greek']; ?> x <?= $product['quantity'] ?></li>
<?php
    }
?>
</ul>
<br />
<?= $price ?>
