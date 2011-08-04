				<div class="right_side">
					<div class="article">
                        <h2><?php echo @$this->lang->line($pagename);?></h2>
                        <p style="display:none;"><span id="stars"></span></p>
<?php 
    echo form_open('checkout/order/'.$lang, array('id'=>'checkout_form')); 
?>
					    <input type="hidden" name="userID" id="userID" value="" />
					    <input type="hidden" name="affiliate" id="affiliate" value="<?php echo $affiliate; ?>" />
                        <input type="hidden" name="user_stars" id="user_stars" value="" />
                        <input type="hidden" name="user_language" id="user_language" value="<?php echo $lang; ?>" />
                        <h2>
                            <?php echo $this->lang->line('main_receipt'); ?>
                        </h2>
					    <div class="search">
                            <label class="search" for="user_name"><?php echo $this->lang->line('main_name'); ?>:</label> 
                            <input type="text" name="user_name" id="user_name" class="required-1" value="" />
                        </div>
					    <div class="search">
                            <label class="search" for="user_surname"><?php echo $this->lang->line('main_surname'); ?>:</label> 
                            <input type="text" name="user_surname" id="user_surname" class="required-1" value="" />
                        </div>
                        <div class="search">
                            <label class="search" for="user_phone"><?php echo $this->lang->line('main_phone'); ?>:</label> 
                            <input type="text" name="user_phone" id="user_phone" class="required-1" value="" />
                        </div>
                        <div class="search">
                            <label class="search" for="user_address"><?php echo $this->lang->line('main_address'); ?>:</label> 
                            <input type="text" name="user_address" id="user_address" class="required-1" value="" />
                        </div>
                        <div class="search">
                            <label class="search" for="user_city"><?php echo $this->lang->line('main_city'); ?>:</label> 
                            <input type="text" name="user_city" id="user_city" class="required-1" value="" />
                        </div>
                        <div class="search">
                            <label class="search" for="user_zip"><?php echo $this->lang->line('main_zip'); ?>:</label> 
                            <input type="text" name="user_zip" id="user_zip" class="required-1" value="" />
                        </div>
                        <div class="search">
                            <label class="search" for="user_country"><?php echo $this->lang->line('main_country'); ?>:</label> 
                            <input type="text" name="user_country" id="user_country" class="required-1" value="<?php echo $this->lang->line('main_greece'); ?>" />
                        </div>
                        <h2>
                            <?php echo $this->lang->line('main_more_data'); ?> - <?php echo $this->lang->line('main_questionnaire'); ?>
                        </h2>
                        <div class="small">(<?php echo $this->lang->line('main_optional_data'); ?>)</div>
                        <div class="search">
                            <label class="search" for="user_email"><?php echo $this->lang->line('main_email'); ?>:</label> 
                            <input type="text" name="user_email" id="user_email" class="" value="" />
                        </div>
                        <div class="search">
                            <label class="search" for="user_birthdate"><?php echo $this->lang->line('main_birthdate'); ?>:</label> 
                            <input type="text" name="user_birthdate" id="user_birthdate" class="contact" value="" readonly="1" />
                            <?php echo $this->calendar_library->createHTML("user_birthdate", "contact"); ?>
                        </div>
                        <div class="search">
                            <label class="search" for="user_url"><?php echo $this->lang->line('main_website'); ?>:</label> 
                            <input type="text" name="user_url" id="user_url" class="contact" value="http://" />
                        </div>
                        <div class="search">
                            <label class="search" for="question1"><?php echo $this->lang->line('main_question1'); ?>:</label> 
                            <input type="text" name="questionnaire[]" id="question1" class="contact" value="" />
                        </div>
                        <div class="search">
                            <label class="search" for="question2"><?php echo $this->lang->line('main_question2'); ?>:</label> 
                            <input type="text" name="questionnaire[]" id="question2" class="contact" value="" />
                        </div>
                        <h2>
                            <?php echo $this->lang->line('main_shippment'); ?>
                        </h2>
                        <div class="search">
                            <label class="search" for="shippment_cash_on_delivery"><?php echo $this->lang->line('main_shippment_cash_on_delivery'); ?>:</label> 
                            <input type="radio" class="check" name="shippment_cash_on_delivery" id="shippment_cash_on_delivery" value="1" onclick="javascript:shippment_sum();"/>
                        </div>
                        <div class="small"><?php echo $this->lang->line('main_shippment_cash_on_delivery_details'); ?></div>
                        <div class="search">
                            <label class="search" for="shippment_paypal"><?php echo $this->lang->line('main_shippment_paypal'); ?>:</label> 
                            <input type="radio" class="check" name="shippment_cash_on_delivery" id="shippment_paypal" value="2" onclick="javascript:shippment_sum();"/>
                        </div>
                        <div class="small"><?php echo $this->lang->line('main_shippment_paypal_details'); ?></div>
                        <div class="search">
                            <label class="search" for="shippment_bank_transfer"><?php echo $this->lang->line('main_shippment_bank_transfer'); ?>:</label> 
                            <input type="radio" class="check" name="shippment_cash_on_delivery" id="shippment_bank_transfer" value="3" onclick="javascript:shippment_sum();"/>
                        </div>
                        <div class="small"><?php echo $this->lang->line('main_shippment_bank_transfer_details'); ?></div>
                        <div class="search">
                            <?php echo $this->lang->line('main_shippment_sum'); ?> : <span id="shippment_costs"><?php echo $this->lang->line('main_shippment_costs'); ?></span> <span id="shippment_sum"></span> <?php echo $this->lang->line('main_currency'); ?>
                        </div>
                        <div class="search">
                            <?php echo $this->lang->line('main_costs_sum'); ?> : <span id="cart_costs"><?php echo $cart_costs; ?></span> + <span id="costs_sum"><?php echo $this->lang->line('main_shippment_costs'); ?> = <?php echo floatval($cart_costs)+floatval($this->lang->line('main_shippment_costs')); ?></span> <?php echo $this->lang->line('main_currency'); ?>
                            <input type="hidden" name="price" id="price" value="<?php echo $cart_costs+$this->lang->line('main_shippment_costs'); ?>" />
                        </div>
                        <div>
                            <input type="submit" value="<?php echo $this->lang->line('main_submit'); ?>" class="submit" /> 
                        </div>
<div id="updateshere"></div>

<script type="text/javascript">
     new Validation('checkout_form'); // OR new Validation(document.forms[0]);
     
     Validation.add('required-1', '<?php echo $this->lang->line("main_required_field"); ?>', {
        minLength : 1
     });
</script>

<?php echo form_close(); ?>
				        <div style="clear: both"></div>
                    </div>
				</div>
