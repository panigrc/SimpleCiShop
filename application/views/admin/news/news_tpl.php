<?php
	echo form_open(sprintf('admin/news/%s', $action ?? ''));
	echo form_hidden('news_id', $news_id ?? '');
?>
	<table>
<?php
	foreach ($this->config->item('supported_languages') as $supported_language)
	{
		echo form_hidden("category_text_id_{$supported_language}", ${"category_text_id_$supported_language"} ?? '');
		echo form_hidden("news_text_id_{$supported_language}", ${"news_text_id_$supported_language"} ?? '');
?>
		<tr>
			<td class="<?= $supported_language ?>">&nbsp;</td>
			<td class="<?= $supported_language ?>"><?= $this->lang->line("main_{$supported_language}") ?></td>
		</tr>
		<tr>
			<td class="<?= $supported_language ?>"><label for="title_<?= $supported_language ?>"><?= $this->lang->line('main_title') ?>:</label></td>
			<td class="<?= $supported_language ?>"><input type="text" name="title_<?= $supported_language ?>" id="title_<?= $supported_language ?>" value="<?= ${"title_$supported_language"} ?? '' ?>"></td>
		</tr>
		<tr>
			<td class="<?= $supported_language ?>"><label for="body_<?= $supported_language ?>"><?= $this->lang->line('main_description') ?>:</label></td>
			<td class="<?= $supported_language ?>"><textarea name="body_<?= $supported_language ?>" id="body_<?= $supported_language ?>"><?= ${"body_$supported_language"} ?? '' ?></textarea></td>
		</tr>
<?php } ?>

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
