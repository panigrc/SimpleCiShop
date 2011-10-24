<?php
    $product = $this->Search_model->getRandomProduct();
    $product['category_text'] = $this->Category_model->getCategoryNames($this->Product_model->getProductCategories($product['productID']));
    $product += $this->Product_model->getProductMainImage($product['productID']);
?>
				<div class="box_top">
					<h2><?php echo $this->lang->line('main_random_product'); ?></h2>
				</div>	
					<div class="box" id="tip">
                        <p class="highlight"><a href="<?php echo site_url('/product/index/'.$lang.'/'.$product['nicename']) ?>"><?php echo $product['title']; ?></a></p>
						<p>
                            <a href="<?php echo site_url('/product/index/'.$lang.'/'.$product['nicename']) ?>"><img src="<?php echo base_url().$product['thumb']; ?>" style="width: 90%; float:none; border:none;" alt="" /></a>
                            <?php echo $product['category_text']; ?><br />
                            <?php echo $product['price'].' '.$this->lang->line('main_currency'); ?>
                             <a href="#" onclick="javascript:<?php echo $this->ajax->remote_function(array('update'=>'items','url'=>site_url('cart/cart_add/'.$lang), 'hoverclass' => 'cart-active', 'loading' => "Element.show('indicator')", 'complete' => "Element.hide('indicator')", 'method' => 'post', 'with' => "'id="."product".$product['productID']."_".$product['productID']."'")); ?>; return false;"><span class="cart_put"></span></a>
                        </p>
					</div>
				<div class="box_bottom"></div>
