<ul>
<?php
    $price = 0;
    foreach($products as $product) {
        $price += $product['price_' . $user['user_language']] * $product['quantity'];
?>
<li><?php echo $product['title_greek']; ?> x <?php echo $product['quantity']; ?></li>
<?php
    }
?>
</ul>
<br />
<?php echo $price; ?>
