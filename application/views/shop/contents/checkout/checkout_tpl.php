<?php $cart_costs = $cart_costs ?? 0; ?>
<div class="right_side">
	<div class="article">
		<h2><?= isset($pagename) ? $this->lang->line($pagename) : '' ?></h2>
		<p style="display:none;"><span id="stars"></span></p>
		<?= form_open('shop/checkout/order', ['id' =>'checkout_form']) ?>
			<input type="hidden" name="affiliate" id="affiliate" value="<?= $affiliate ?? '' ?>" />
			<h2>
				<?= $this->lang->line('main_receipt') ?>
			</h2>
			<div class="search">
				<label class="search" for="email"><?= $this->lang->line('main_email') ?>:</label>
				<input type="text" name="email" id="email" class="" required value="" />
			</div>
			<div class="search">
				<label class="search" for="first_name"><?= $this->lang->line('main_name') ?>:</label>
				<input type="text" name="first_name" id="first_name" required value="" />
			</div>
			<div class="search">
				<label class="search" for="last_name"><?= $this->lang->line('main_last_name') ?>:</label>
				<input type="text" name="last_name" id="last_name" required value="" />
			</div>
			<div class="search">
				<label class="search" for="phone"><?= $this->lang->line('main_phone') ?>:</label>
				<input type="text" name="phone" id="phone" required value="" />
			</div>
			<div class="search">
				<label class="search" for="street"><?= $this->lang->line('main_address') ?>:</label>
				<input type="text" name="street" id="street" required value="" />
			</div>
			<div class="search">
				<label class="search" for="city"><?= $this->lang->line('main_city') ?>:</label>
				<input type="text" name="city" id="city" required value="" />
			</div>
			<div class="search">
				<label class="search" for="zip"><?= $this->lang->line('main_zip') ?>:</label>
				<input type="text" name="zip" id="zip" required value="" />
			</div>
			<div class="search">
				<label class="search" for="country"><?= $this->lang->line('main_country') ?>:</label>
				<input type="text" name="country" id="country" required value="<?= $this->lang->line('main_greece') ?>" />
			</div>
			<h2>
				<?= $this->lang->line('main_more_data') ?> - <?= $this->lang->line('main_questionnaire') ?>
			</h2>
			<div class="small">(<?= $this->lang->line('main_optional_data') ?>)</div>
			<div class="search">
				<label class="search" for="birthdate"><?= $this->lang->line('main_birthdate') ?>:</label>
				<input type="text" name="birthdate" id="birthdate" class="contact" value=""/>
			</div>
			<div class="search">
				<label class="search" for="url"><?= $this->lang->line('main_website') ?>:</label>
				<input type="text" name="url" id="url" class="contact" value="http://" />
			</div>
			<div class="search">
				<label class="search" for="question1"><?= $this->lang->line('main_question1') ?>:</label>
				<input type="text" name="questionnaire[]" id="question1" class="contact" value="" />
			</div>
			<div class="search">
				<label class="search" for="question2"><?= $this->lang->line('main_question2') ?>:</label>
				<input type="text" name="questionnaire[]" id="question2" class="contact" value="" />
			</div>
			<h2>
				<?= $this->lang->line('main_shipping') ?>
				<?= $this->lang->line('main_shipping') ?>
			</h2>
			<div class="search">
				<label class="search" for="shipment_cash_on_delivery"><?= $this->lang->line('main_shipping_cash_on_delivery') ?>:</label>
				<input type="radio" class="check" name="shipment_cash_on_delivery" id="shipment_cash_on_delivery" value="<?= Order_model::PAYMENT_TYPE_CASH_ON_DELIVERY ?>" onclick="shipment_sum();"/>
			</div>
			<div class="small"><?= $this->lang->line('main_shipping_cash_on_delivery_details') ?></div>
			<div class="search">
				<label class="search" for="shipment_paypal"><?= $this->lang->line('main_shipping_paypal') ?>:</label>
				<input type="radio" class="check" name="shipment_cash_on_delivery" id="shipment_paypal" value="<?= Order_model::PAYMENT_TYPE_PAYPAL ?>" onclick="shipment_sum();"/>
			</div>
			<div class="small"><?= $this->lang->line('main_shipping_paypal_details') ?></div>
			<div class="search">
				<label class="search" for="shipment_bank_transfer"><?= $this->lang->line('main_shipping_bank_transfer') ?>:</label>
				<input type="radio" class="check" name="shipment_cash_on_delivery" id="shipment_bank_transfer" value="<?= Order_model::PAYMENT_TYPE_BANK_TRANSFER?>" onclick="shipment_sum();"/>
			</div>
			<div class="small"><?= $this->lang->line('main_shipping_bank_transfer_details') ?></div>
			<div class="search">
				<?= $this->lang->line('main_shipping_sum') ?> : <span id="shipment_costs"><?= $this->lang->line('main_shipping_costs') ?></span> <span id="shipment_sum"></span> <?= $this->lang->line('main_currency') ?>
			</div>
			<div class="search">
				<?= $this->lang->line('main_costs_sum') ?> : <span id="cart_costs"><?= $cart_costs ?? '' ?></span> + <span id="costs_sum"><?= $this->lang->line('main_shipping_costs') ?> = <?= (float) $cart_costs + (float) $this->lang->line('main_shipping_costs') ?></span> <?= $this->lang->line('main_currency') ?>
				<input type="hidden" name="price" id="price" value="<?= $cart_costs + $this->lang->line('main_shipping_costs') ?>" />
			</div>
			<div>
				<input type="submit" value="<?= $this->lang->line('main_submit') ?>" class="submit" />
			</div>
			<div id="updateshere"></div>
		<?= form_close() ?>
		<div style="clear: both"></div>
	</div>
</div>
