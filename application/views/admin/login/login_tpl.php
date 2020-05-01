<?php
	echo form_open('admin/home/index');
?>
	<table>
		<tr>
			<td class="greek"><label for="username"><?= $this->lang->line('main_username') ?>:</label></td>
			<td class="greek"><input type="text" name="username" id="username" value=""></td>
		</tr>
		<tr>
			<td class="greek"><label for="password"><?= $this->lang->line('main_password') ?>:</label></td>
			<td class="greek"><input type="password" name="password" id="password" value=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<input type="submit" name="submit_form" id="submit_form"
					   value="<?= $this->lang->line('main_submit') ?>">
			</td>
		</tr>
	</table>
<?php
	echo form_close();
?>
