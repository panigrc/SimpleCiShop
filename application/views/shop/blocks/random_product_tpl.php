<?php
	$products = $this->search_model->search_products(
			$this->language_library->get_language(),
			$this->category_model->get_root_category(),
			TRUE,
			1,
			0,
			'price',
			'RANDOM'
	);
	$product = current($products);

	$product['category_text'] = $this->category_model->get_category_names($this->product_model->get_product_categories($product['product_id']));
	$product += $this->product_model->get_product_main_image($product['product_id']);
?>
<div class="box_top">
	<h2><?= $this->lang->line('main_random_product') ?></h2>
</div>
	<div class="box" id="tip">
		<p class="highlight"><a href="<?= site_url('/shop/product/index/'.$product['slug']) ?>"><?= $product['title'] ?></a></p>
		<p>
			<a href="<?= site_url('/shop/product/index/'.$product['slug']) ?>"><img src="<?= base_url().$product['thumb'] ?>" style="width: 90%; float:none; border:none;" alt="" /></a>
			<?= $product['category_text'] ?><br />
			<?= $product['price'].' '.$this->lang->line('main_currency') ?>
			<a href="<?=site_url('shop/cart/cart_add/'.$product['product_id'])?>"><i class="fas fa-cart-arrow-down"></i></a>
		</p>
	</div>
<div class="box_bottom"></div>
