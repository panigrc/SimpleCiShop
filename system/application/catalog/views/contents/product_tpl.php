					<div class="article">
						<h1><?php echo $product['title_'.$lang]; ?></h1>
			<p>
                            <?php echo $this->lang->line('main_cart_add'); ?> <a href="#" onclick="javascript:<?php echo $this->ajax->remote_function(array('update'=>'items','url'=>site_url('cart/cart_add/'.$lang), 'hoverclass' => 'cart-active', 'loading' => "Element.show('indicator')", 'complete' => "Element.hide('indicator')", 'method' => 'post', 'with' => "'id="."product".$product['productID']."_".$product['productID']."'")); ?>; return false;"><span class="cart_put"></span></a>
                        </p>
			<p>
				<a href="http://www.cool-clean-quiet.com/blog/tag/<?php echo $product['nicename']; ?>" target="_blank"><?php echo $this->lang->line('main_product_news'); ?></a>
			</p>
                        <img src="<?php echo base_url().$product['thumb']; ?>" alt="" style="float:right;" />
                        <?php echo $product['description_'.$lang] ?>
                        
                        <div class="grey_top"></div>
                        <div class="grey">
                            <?php if(!empty($product['category_text'])): ?><p class="highlight"><span class="label"><?php echo $this->lang->line('main_category'); ?>:&nbsp;</span> <?php echo $product['category_text']; ?></p><?php endif; ?>
                            <p class="highlight"><span class="label"><?php echo $this->lang->line('main_stock'); ?>:&nbsp;</span> <?php echo $product['stock']==0 ? "<span style='color:red;'>".$this->lang->line('main_out_of_stock')."</span>" : $product['stock']; ?></p>
                            <?php if($product['price_old_'.$lang]!=0): ?><p class="highlight"><span class="label"><?php echo $this->lang->line('main_price_old'); ?>:&nbsp;</span> <span style="text-decoration: line-through;"><?php echo number_format($product['price_old_'.$lang], 0, ",", ".").' '.$this->lang->line('main_currency'); ?></span></p><?php endif; ?>
                            <?php if(!empty($product['price_'.$lang])): ?><p class="highlight"><span class="label"><?php echo $this->lang->line('main_price'); ?>:&nbsp;</span> <?php echo $product['price_'.$lang].' '.$this->lang->line('main_currency'); ?></p><?php endif; ?>
                            <?php if($this->Product_model->getProductMeta($product['productID'], "Size")) : ?><p class="highlight"><?php echo $this->Product_model->getProductMeta($product['productID'], "Size"); ?></p><?php endif; ?>
                            <?php if($this->Product_model->getProductMeta($product['productID'], "Artist")) : ?><p class="highlight"><?php echo $this->Product_model->getProductMeta($product['productID'], "Artist"); ?></p><?php endif; ?>
                        </div>
                        <p>
                            <?php echo $this->lang->line('main_cart_add'); ?> <a href="#" onclick="javascript:<?php echo $this->ajax->remote_function(array('update'=>'items','url'=>site_url('cart/cart_add/'.$lang), 'hoverclass' => 'cart-active', 'loading' => "Element.show('indicator')", 'complete' => "Element.hide('indicator')", 'method' => 'post', 'with' => "'id="."product".$product['productID']."_".$product['productID']."'")); ?>; return false;"><span class="cart_put"></span></a>
                        </p>
                        
                        <?php if($this->Product_model->getProductMeta($product['productID'], "Τύπος")) echo $this->Product_model->getProductMeta($product['productID'], "Τύπος"); ?>
                        <div class="product">
<?php
    $images="";
    if(!empty($images_arr))
        foreach($images_arr as $current) :
            $images .= $current['product_imageID'] . ",";
            //list($w, $h) = getimagesize(base_url().$current['big']);
?>

    <?php /*<a href="javascript:void(0);" onclick="return overlib('&lt;img src=\'<?php echo base_url().$current['big']; ?>\' style=\'border: 0px;<?php echo $w>600 ? " width: 600px;" : "" ?>\' onclick=\'return nd();\' /&gt;', WIDTH, 100, STICKY, CAPTION, '&nbsp;');"><img src="<?php echo base_url().$current['thumb']; ?>" alt="" id="<?php echo 'product_'.$product['productID']; ?>" class="cart_product" /></a> */ ?>
    <img src="<?php echo base_url().$current['big']; ?>" alt="" id="<?php echo 'product_'.$product['productID']; ?>" class="cart_product" />
    <?php echo $this->ajax->dragable_element('product_'.$product['productID'], array('revert'=>'true')); ?>

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
