<?php
	echo form_open(sprintf('admin/user/%s', $action ?? ''));
	echo form_hidden('user_id', $user_id ?? '');
?>
	<table>
		<tr>
			<td class="general"><label for="password"><?= $this->lang->line('main_password') ?>:</label></td>
			<td class="general"><input type="text" name="password" id="password" value="<?= $password ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="first_name"><?= $this->lang->line('main_first_name') ?>:</label></td>
			<td class="general"><input type="text" name="first_name" id="first_name" value="<?= $first_name ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="last_name"><?= $this->lang->line('main_last_name') ?>:</label></td>
			<td class="general"><input type="text" name="last_name" id="last_name" value="<?= $last_name ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="email"><?= $this->lang->line('main_email') ?>:</label></td>
			<td class="general"><input type="text" name="email" id="email" value="<?= $email ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="url"><?= $this->lang->line('main_website') ?>:</label></td>
			<td class="general"><input type="text" name="url" id="url" value="<?= $url ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="birthdate"><?= $this->lang->line('main_birthdate') ?>:</label></td>
			<td class="general"><input type="text" name="birthdate" id="birthdate" value="<?= $birthdate ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="street"><?= $this->lang->line('main_address') ?>:</label></td>
			<td class="general"><input type="text" name="street" id="street" value="<?= $street ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="city"><?= $this->lang->line('main_city') ?>:</label></td>
			<td class="general"><input type="text" name="city" id="city" value="<?= $city ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="zip"><?= $this->lang->line('main_zip') ?>:</label></td>
			<td class="general"><input type="text" name="zip" id="zip" value="<?= $zip ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="country"><?= $this->lang->line('main_country') ?>:</label></td>
			<td class="general"><input type="text" name="country" id="country" value="<?= $country ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="phone"><?= $this->lang->line('main_phone') ?>:</label></td>
			<td class="general"><input type="text" name="phone" id="phone" value="<?= $phone ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="language"><?= $this->lang->line('main_language') ?>:</label></td>
			<td class="general"><input type="text" name="language" id="language" value="<?= $language ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="registered"><?= $this->lang->line('main_user_registered_at') ?>:</label></td>
			<td class="general"><input type="text" name="registered" id="registered" value="<?= $registered ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="general"><label for="credits"><?= $this->lang->line('main_user_points') ?>:</label></td>
			<td class="general"><input type="text" name="credits" id="credits" value="<?= $credits ?? '' ?>"></td>
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
