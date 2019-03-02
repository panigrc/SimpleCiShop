					<div class="article">
						<h1><?php echo $product['title_'.$lang]; ?></h1>
			<p>
                            <?php echo $this->lang->line('main_cart_add'); ?> <a href="<?=site_url('shop/cart/cart_add/'.$product['product_id'])?>"><i class="fas fa-cart-arrow-down"></i></a>
            </p>
			<p>
				<a href="http://www.cool-clean-quiet.com/blog/tag/<?php echo $product['slug']; ?>" target="_blank"><?php echo $this->lang->line('main_product_news'); ?></a>
			</p>
                        <img src="<?php echo base_url().$product['thumb']; ?>" alt="" style="float:right;" />
                        <?php echo $product['description_'.$lang] ?>
                        
                        <div class="grey_top"></div>
                        <div class="grey">
                            <?php if( ! empty($product['category_text'])): ?><p class="highlight"><span class="label"><?php echo $this->lang->line('main_category'); ?>:&nbsp;</span> <?php echo $product['category_text']; ?></p><?php endif; ?>
                            <p class="highlight"><span class="label"><?php echo $this->lang->line('main_stock'); ?>:&nbsp;</span> <?php echo $product['stock'] === 0 ? "<span style='color:red;'>".$this->lang->line('main_out_of_stock')."</span>" : $product['stock']; ?></p>
                            <?php if($product['price_old_'.$lang]!=0): ?><p class="highlight"><span class="label"><?php echo $this->lang->line('main_price_old'); ?>:&nbsp;</span> <span style="text-decoration: line-through;"><?php echo number_format($product['price_old_'.$lang], 0, ",", ".").' '.$this->lang->line('main_currency'); ?></span></p><?php endif; ?>
                            <?php if( ! empty($product['price_'.$lang])): ?><p class="highlight"><span class="label"><?php echo $this->lang->line('main_price'); ?>:&nbsp;</span> <?php echo $product['price_'.$lang].' '.$this->lang->line('main_currency'); ?></p><?php endif; ?>
                            <?php if($this->product_model->get_product_meta($product['product_id'], "Size")) : ?><p class="highlight"><?php echo $this->product_model->get_product_meta($product['product_id'], "Size"); ?></p><?php endif; ?>
                            <?php if($this->product_model->get_product_meta($product['product_id'], "Artist")) : ?><p class="highlight"><?php echo $this->product_model->get_product_meta($product['product_id'], "Artist"); ?></p><?php endif; ?>
                        </div>
                        <p>
                            <?php echo $this->lang->line('main_cart_add'); ?> <a href="<?=site_url('shop/cart/cart_add/'.$product['product_id'])?>"><i class="fas fa-cart-arrow-down"></i></a>
                        </p>
                        
                        <?php if($this->product_model->get_product_meta($product['product_id'], "Τύπος")) echo $this->product_model->get_product_meta($product['product_id'], "Τύπος"); ?>
                        <div class="product">
<?php
    $images="";
    if( ! empty($images_arr))
        foreach($images_arr as $current) :
            $images .= $current['product_image_id'] . ",";
            //list($w, $h) = getimagesize(base_url().$current['big']);
?>

    <img src="<?php echo base_url().$current['big']; ?>" alt="" id="<?php echo 'product_'.$product['product_id']; ?>" class="cart_product" />

<?php
        endforeach;
?>
                        </div>
<?php
    //foreach($meta as $key => $value) echo "<p>". $key . " : " . $value ."</p>";
?>
                        <p><a href="javascript:history.go(-1)">&lt;&lt; <?php echo $this->lang->line('main_go_back'); ?></a></p>
                        <div style="clear: both;"></div>
					</div>
