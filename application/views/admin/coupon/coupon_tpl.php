<?php
	echo form_open(sprintf('admin/coupon/%s', $action ?? ''));
?>
	<table>
	<tr>
		<td class="general"><label for="expires"><?= $this->lang->line('main_coupon_expiration_date') ?></label></td>
		<td class="general">
			<select name="expires" id="expires">
				<option value="<?= time() + (7 * 24 * 60 * 60) ?>">1 <?= $this->lang->line('main_week') ?></option>
				<option value="<?= time() + (30 * 24 * 60 * 60) ?>">1 <?= $this->lang->line('main_month') ?></option>
				<option value="<?= time() + (6 * 30 * 24 * 60 * 60) ?>">½ <?= $this->lang->line('main_year') ?></option>
				<option value="<?= time() + (12 * 30 * 24 * 60 * 60) ?>">1 <?= $this->lang->line('main_year') ?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td class="general"><label for="discount"><?= $this->lang->line('main_coupon_discount') ?> %</label></td>
		<td class="general"><input type="text" name="discount" id="discount" /></td>
	</tr>
	<tr>
		<td class="general"><label for="type"><?= $this->lang->line('main_coupon_type') ?></label></td>
		<td class="general">
			<select name="type" id="type">
				<option value="<?= Coupon_model::COUPON_TYPE_SINGLE_USE ?>"><?= $this->lang->line('main_coupon_type_single_use') ?></option>
				<option value="<?= Coupon_model::COUPON_TYPE_REUSABLE ?>"><?= $this->lang->line('main_coupon_type_reusable') ?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td class="general"><label for="uuid"><?= $this->lang->line('main_coupon_uuid') ?></label></td>
		<td class="general"><input type="text" id="uuid" name="uuid" /></td>
	</tr>
	<tr>
		<td class="general"><label for="amount"><?= $this->lang->line('main_coupon_generate_amount') ?></label></td>
		<td class="general"><input type="text" name="amount" id="amount" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" name="submit_form" id="submit_form" value="<?= $this->lang->line('main_save') ?>">
			<input type="button" name="cancel" id="cancel" value="<?= $this->lang->line('main_cancel') ?>" onclick="history.go(-1)">
		</td>
	</tr>
	</table>
<?php
	echo form_close();
?>
