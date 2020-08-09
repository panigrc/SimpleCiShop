<?php
	echo form_open(sprintf('admin/news/%s', $action ?? ''));
	echo form_hidden('news_id', $news_id ?? '');
	echo form_hidden('news_text_id_greek', $news_text_id_greek ?? '');
	echo form_hidden('news_text_id_german', $news_text_id_german ?? '');
	echo form_hidden('news_text_id_english', $news_text_id_english ?? '');
?>
	<table>
		<tr>
			<td class="greek">&nbsp;</td>
			<td class="greek"><?= $this->lang->line('main_greek') ?></td>
		</tr>
		<tr>
			<td class="greek"><label for="title_greek"><?= $this->lang->line('main_title') ?>:</label></td>
			<td class="greek"><input type="text" name="title_greek" id="title_greek" value="<?= $title_greek ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="greek"><label for="body_greek"><?= $this->lang->line('main_description') ?>:</label></td>
			<td class="greek"><textarea name="body_greek" id="body_greek"><?= $body_greek ?? '' ?></textarea></td>
		</tr>
		<tr>
			<td class="german">&nbsp;</td>
			<td class="german"><?= $this->lang->line('main_german') ?></td>
		</tr>
		<tr>
			<td class="german"><label for="title_german"><?= $this->lang->line('main_title') ?>:</label></td>
			<td class="german"><input type="text" name="title_german" id="title_german" value="<?= $title_german ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="german"><label for="body_german"><?= $this->lang->line('main_description') ?>:</label></td>
			<td class="german"><textarea name="body_german" id="body_german"><?= $body_german ?? '' ?></textarea></td>
		</tr>
		<tr>
			<td class="english">&nbsp;</td>
			<td class="english"><?= $this->lang->line('main_english') ?></td>
		</tr>
		<tr>
			<td class="english"><label for="title_english"><?= $this->lang->line('main_title') ?>:</label></td>
			<td class="english"><input type="text" name="title_english" id="title_english" value="<?= $title_english ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="english"><label for="body_english"><?= $this->lang->line('main_description') ?>:</label></td>
			<td class="english"><textarea name="body_english" id="body_english"><?= $body_english ?? '' ?></textarea></td>
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
