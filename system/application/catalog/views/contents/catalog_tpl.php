<?php if($category_text) : ?>
					<div>
						<h1><?php echo $category_text['category_name_'.$lang]; ?></h1>
						<p>
                            <?php echo $category_text['category_description_'.$lang]; ?> 
                        </p>
					</div>
<?php endif;?>
                    <div style="clear:both;"></div>
                    <div style="width:100%; text-align: center;">
<?php foreach($products as $product): ?>
					    <div class="item">
						    <?php /*<h3><?php echo $this->lang->line('main_category'); ?>: 
                            <?php echo $product['category_name_'.$lang]; ?></h3> */?>
                            <a href="<?php echo site_url('/product/index/'.$lang.'/'.$product['nicename']) ?>"><img src="<?php echo empty($product['thumb']) == false ? base_url().$product['thumb'] : base_url().'images/noimage.jpg' ; ?>" class="cart_product" id="product_<?php echo $product['productID']; ?>" alt="<?php echo $product['title_'.$lang]; ?>" /></a>
                            <div class="item_title"><?php echo $product['title_'.$lang]; ?></div>
                            <?php if($this->Product_model->getProductMeta($product['productID'], "Size")) : ?><div class="item_size"><?php echo $this->Product_model->getProductMeta($product['productID'], "Size"); ?></div><?php endif; ?>
                            <?php if($this->Product_model->getProductMeta($product['productID'], "Artist")) : ?><div class="item_artist"><?php echo $this->Product_model->getProductMeta($product['productID'], "Artist"); ?></div><?php endif; ?>
                            <?php //echo $this->ajax->dragable_element('product_'.$product['productID'], array('revert'=>'true')); ?>
                            <?php //echo $this->lang->line('main_description'); ?>
                            <?php //echo mb_substr(strip_tags($product['description_'.$lang]), 0, 350, 'UTF-8').'...'; ?>
                            <?php //echo $this->lang->line('main_price'); ?>
                             <span style="text-decoration: line-through;"><?php if($product['price_old_'.$lang]!=0) echo $product['price_old_'.$lang].' '.$this->lang->line('main_currency'); ?></span>&nbsp;<?php echo $product['price_'.$lang].' '.$this->lang->line('main_currency'); ?>&nbsp;
                            <a href="#" onclick="javascript:<?php echo $this->ajax->remote_function(array('update'=>'items','url'=>site_url('cart/cart_add/'.$lang), 'hoverclass' => 'cart-active', 'loading' => "Element.show('indicator')", 'complete' => "Element.hide('indicator')", 'method' => 'post', 'with' => "'id="."product".$product['productID']."_".$product['productID']."'")); ?>; return false;"><span class="cart_put"></span></a>
					    </div>
<?php endforeach; ?>
                    </div>
                    <div style="clear:both;"></div>
                    <div style="margin: 5px 0 5px 0; text-align: center;">
                        <span class="small"><?php echo $this->lang->line('main_price_decleration'); ?></span>
                        <br />
                        <?php if(!empty($pagination)) echo $this->lang->line('main_page') .': '. @$pagination; ?>
                    </div>
