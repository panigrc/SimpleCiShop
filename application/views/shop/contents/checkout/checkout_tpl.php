<?php $cart_costs = $cart_costs ?? 0; ?>
<div class="right_side">
	<div class="article">
		<h2><?= isset($pagename) ? $this->lang->line($pagename) : '' ?></h2>
		<p style="display:none;"><span id="stars"></span></p>
		<?= form_open('checkout/order', ['id' =>'checkout_form']) ?>
			<input type="hidden" name="user_id" id="user_id" value="" />
			<input type="hidden" name="affiliate" id="affiliate" value="<?= $affiliate ?? '' ?>" />
			<input type="hidden" name="user_stars" id="user_stars" value="" />
			<h2>
				<?= $this->lang->line('main_receipt') ?>
			</h2>
			<div class="search">
				<label class="search" for="user_name"><?= $this->lang->line('main_name') ?>:</label>
				<input type="text" name="user_name" id="user_name" required value="" />
			</div>
			<div class="search">
				<label class="search" for="user_surname"><?= $this->lang->line('main_last_name') ?>:</label>
				<input type="text" name="user_surname" id="user_surname" required value="" />
			</div>
			<div class="search">
				<label class="search" for="user_phone"><?= $this->lang->line('main_phone') ?>:</label>
				<input type="text" name="user_phone" id="user_phone" required value="" />
			</div>
			<div class="search">
				<label class="search" for="user_address"><?= $this->lang->line('main_address') ?>:</label>
				<input type="text" name="user_address" id="user_address" required value="" />
			</div>
			<div class="search">
				<label class="search" for="user_city"><?= $this->lang->line('main_city') ?>:</label>
				<input type="text" name="user_city" id="user_city" required value="" />
			</div>
			<div class="search">
				<label class="search" for="user_zip"><?= $this->lang->line('main_zip') ?>:</label>
				<input type="text" name="user_zip" id="user_zip" required value="" />
			</div>
			<div class="search">
				<label class="search" for="user_country"><?= $this->lang->line('main_country') ?>:</label>
				<input type="text" name="user_country" id="user_country" required value="<?= $this->lang->line('main_greece') ?>" />
			</div>
			<h2>
				<?= $this->lang->line('main_more_data') ?> - <?= $this->lang->line('main_questionnaire') ?>
			</h2>
			<div class="small">(<?= $this->lang->line('main_optional_data') ?>)</div>
			<div class="search">
				<label class="search" for="user_email"><?= $this->lang->line('main_email') ?>:</label>
				<input type="text" name="user_email" id="user_email" class="" value="" />
			</div>
			<div class="search">
				<label class="search" for="user_birthdate"><?= $this->lang->line('main_birthdate') ?>:</label>
				<input type="text" name="user_birthdate" id="user_birthdate" class="contact" value=""/>
			</div>
			<div class="search">
				<label class="search" for="user_url"><?= $this->lang->line('main_website') ?>:</label>
				<input type="text" name="user_url" id="user_url" class="contact" value="http://" />
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
				<input type="radio" class="check" name="shipment_cash_on_delivery" id="shipment_cash_on_delivery" value="1" onclick="shipment_sum();"/>
			</div>
			<div class="small"><?= $this->lang->line('main_shipping_cash_on_delivery_details') ?></div>
			<div class="search">
				<label class="search" for="shipment_paypal"><?= $this->lang->line('main_shipping_paypal') ?>:</label>
				<input type="radio" class="check" name="shipment_cash_on_delivery" id="shipment_paypal" value="2" onclick="shipment_sum();"/>
			</div>
			<div class="small"><?= $this->lang->line('main_shipping_paypal_details') ?></div>
			<div class="search">
				<label class="search" for="shipment_bank_transfer"><?= $this->lang->line('main_shipping_bank_transfer') ?>:</label>
				<input type="radio" class="check" name="shipment_cash_on_delivery" id="shipment_bank_transfer" value="3" onclick="shipment_sum();"/>
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
