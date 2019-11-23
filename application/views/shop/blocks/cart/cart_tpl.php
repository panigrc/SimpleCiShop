<?php if (count($cart_items) > 0): ?>
<div style="clear:both;"></div>
<div class="cart-top"><h2><?= $this->lang->line('main_cart') ?></h2></div>
<div id="cart" class="cart">
	<div id="items">

		<?php
		$sum = 0;
		foreach ($cart_items as $product):
			for ($i = 0; $i < $product['quantity']; $i++) :
				?>
				<div class="closable">
					<a href="<?= site_url('/shop/product/index/' . $product['slug']) ?>">
						<img
							src="<?= empty($product['thumb']) === FALSE ? base_url() . $product['thumb'] : base_url() . 'images/noimage.jpg' ?>"
							class="cart-items" id="product<?= $i ?>_<?= $product['product_id'] ?>"
							alt="<?= $product['title_' . $this->language_library->get_language()] ?>"/>
					</a>
					<a href="<?= site_url('/shop/cart/cart_remove/' . $product['product_id']) ?>" class="close"></a>
				</div>
				<?php
				$sum += $product['price_' . $this->language_library->get_language()];
			endfor;
		endforeach;
		?>

		<div style="clear:left;"></div>
		<p>
			<?= $this->lang->line('main_cart_cost') ?>: <?= $sum ?>
			<?= $this->lang->line('main_currency') ?>
		</p>

	</div>
	<div><a href="<?= site_url("shop/checkout") ?>"><?= $this->lang->line('main_checkout') ?></a></div>
</div>
<?php endif; ?>
