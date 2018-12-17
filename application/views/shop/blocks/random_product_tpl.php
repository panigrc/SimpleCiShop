<?php
    $product = $this->search_model->get_random_product();
    $product['category_text'] = $this->category_model->get_category_names($this->product_model->get_product_categories($product['product_id']));
    $product += $this->product_model->get_product_main_image($product['product_id']);
?>
				<div class="box_top">
					<h2><?php echo $this->lang->line('main_random_product'); ?></h2>
				</div>	
					<div class="box" id="tip">
                        <p class="highlight"><a href="<?php echo site_url('/shop/product/index'.$product['nicename']) ?>"><?php echo $product['title']; ?></a></p>
						<p>
                            <a href="<?php echo site_url('/shop/product/index/'.$product['nicename']) ?>"><img src="<?php echo base_url().$product['thumb']; ?>" style="width: 90%; float:none; border:none;" alt="" /></a>
                            <?php echo $product['category_text']; ?><br />
                            <?php echo $product['price'].' '.$this->lang->line('main_currency'); ?>
                             <a href="#" onclick="javascript:<?php echo $this->ajax->remote_function(array('update'=>'items','url'=>site_url('shop/cart/cart_add'), 'hoverclass' => 'cart-active', 'loading' => "Element.show('indicator')", 'complete' => "Element.hide('indicator')", 'method' => 'post', 'with' => "'id="."product".$product['product_id']."_".$product['product_id']."'")); ?>; return false;"><i class="fas fa-cart-arrow-down"></i></a>
                        </p>
					</div>
				<div class="box_bottom"></div>
