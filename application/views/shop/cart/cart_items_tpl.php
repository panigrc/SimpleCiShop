<?php
    
    $sum=0;
    foreach($cart as $product):
        for($i=0;$i<$product['quantity'];$i++) :
?>
                    <div class="cart_item">
                        <a href="<?php echo site_url('/shop/product/index/'.$product['slug']) ?>">
                            <img src="<?php echo empty($product['thumb']) === FALSE ? base_url().$product['thumb'] : base_url().'images/noimage.jpg' ; ?>" class="cart_items" id="product<?php echo $i; ?>_<?php echo $product['product_id']; ?>" alt="<?php echo $product['title_'.$lang]; ?>" title="<?php echo $product['title_'.$lang]; ?>"/>
                        </a>
                        <br />
                        <a href="<?php site_url('shop/cart/cart_remove/'.$product['product_id']) ?>">
                            <span class="cart_remove"></span>
                            <span class="fa-stack fa-2x cart-remove">
                                <i class="fas fa-shopping-cart fa-stack-2x"></i>
                                <i class="fas fa-arrow-up fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </div>
<?php 
            $sum += $product['price_'.$lang];
        endfor;
    endforeach;
?>

                    <div style="clear:left;"></div>
                    <p>
                        <?php echo $this->lang->line('main_cart_cost'); ?>:
                        <?php echo $sum.' '.$this->lang->line('main_currency'); ?>
                    </p>
                    <script type="text/javascript">if(document.getElementById("cart_costs")!=NULL){ $("cart_costs").innerHTML=<?php echo $sum; ?>; shipment_sum();}</script>
