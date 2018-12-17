<div style="clear:both;"></div>
<div class="cart_top"><h2><?php echo $this->lang->line('main_cart'); ?></h2></div>
<div id="cart" class="cart"> 
  <div id="items"></div>
  <div><a href="<?php echo site_url("checkout"); ?>"><?php echo $this->lang->line('main_checkout'); ?></a></div>
</div>
<div class="cart_bottom"></div>

<?php 
echo $this->ajax->drop_receiving_element('cart',
	 array('update'=>'items','url'=> site_url('cart/cart_add'),
	  'accept' => 'cart_product' , 'hoverclass' => 'cart-active',
	  'loading' => "Element.show('indicator')",
      'complete' => "Element.hide('indicator')") );
?>
<script type="text/javascript"> <?php echo $this->ajax->remote_function(array('update'=>'items','url'=>site_url('cart/cart_update'))); ?>;</script>
<div style="height: 20px; padding-top: 5px;">
    <p id="indicator" style="display: none; margin-top: 0px; font-size: 0.6em;">
        <i class="fas fa-spinner fa-spin"></i>
    <?php //echo $this->lang->line('main_cart_update'); ?></p>
</div>