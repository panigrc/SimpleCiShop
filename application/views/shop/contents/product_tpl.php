<div class="article">
	<?php if (isset($product)) { ?>
	<h1><?= $product['title_'.$this->language_library->get_language()] ?? '' ?></h1>
	<p>
		<?= $this->lang->line('main_cart_add') ?> <a href="<?=site_url('shop/cart/cart_add/'.$product['product_id'])?>"><i class="fas fa-cart-arrow-down"></i></a>
	</p>
	<img src="<?= base_url().$product['thumb'] ?>" alt="" style="float:right;" />
	<?= $product['description_'.$this->language_library->get_language()] ?>

	<div class="grey_top"></div>
	<div class="grey">
		<?php if( ! empty($product['category_text'])): ?><p class="highlight"><span class="label"><?= $this->lang->line('main_category') ?>:&nbsp;</span> <?= $product['category_text'] ?></p><?php endif ?>
		<p class="highlight"><span class="label"><?= $this->lang->line('main_stock') ?>:&nbsp;</span> <?= $product['stock'] === 0 ? "<span style='color:red;'>".$this->lang->line('main_out_of_stock'). '</span>' : $product['stock'] ?></p>
		<?php if($product['price_old_'.$this->language_library->get_language()] !== 0): ?><p class="highlight"><span class="label"><?= $this->lang->line('main_price_old') ?>:&nbsp;</span> <span style="text-decoration: line-through;"><?= number_format($product['price_old_'.$this->language_library->get_language()], 0, ',', '.').' '.$this->lang->line('main_currency') ?></span></p><?php endif ?>
		<?php if( ! empty($product['price_'.$this->language_library->get_language()])): ?><p class="highlight"><span class="label"><?= $this->lang->line('main_price') ?>:&nbsp;</span> <?= $product['price_'.$this->language_library->get_language()].' '.$this->lang->line('main_currency') ?></p><?php endif ?>
	</div>
	<p>
		<?= $this->lang->line('main_cart_add') ?> <a href="<?=site_url('shop/cart/cart_add/'.$product['product_id'])?>"><i class="fas fa-cart-arrow-down"></i></a>
	</p>

	<?= false === empty($this->product_model->get_product_meta($product['product_id'], 'Τύπος')) ? $this->product_model->get_product_meta($product['product_id'], 'Τύπος') : '' ?>
	<div class="product">
	<?php
		$images= '';
		foreach($images_arr ?? [] as $current) :
			$images .= $current['product_image_id'] . ',';
	?>
		<img src="<?= base_url().$current['big'] ?>" alt="" id="<?= 'product_'.$product['product_id'] ?>" class="cart_product" />
	<?php
		endforeach;
	?>
	</div>
	<?php } ?>
	<p><a href="javascript:history.go(-1)">&lt;&lt; <?= $this->lang->line('main_go_back') ?></a></p>
	<div style="clear: both;"></div>
</div>
