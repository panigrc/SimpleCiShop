<?php
	function printOptions($arr, $category_id, $level=0) {
		$obj =& get_instance();
		foreach ($arr as $item => $key) {
?>
			<option value="<?= $item ?>" <?= $item === $category_id ? 'selected' : '' ?>><?= str_repeat('-', $level).' '. $obj->category_model->get_category_name($item) ?></option>
<?php
			printOptions($key, $category_id, $level+1);
		}
	}
?>
<?php
	echo form_open(sprintf('admin/category/%s', $action ?? ''));
	echo form_hidden('category_id', $category_id ?? '');
?>
	<table>
	<tr>
		<td><label for="parent_category_id"><?= $this->lang->line('main_category') ?>:</label></td>
		<td>
			<select name="parent_category_id" id="parent_category_id">
				<option value="0"></option>
				<?php
				printOptions($categories_arr ?? [], $parent_category_id ?? null);
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td class="general"><label for="slug">Slug:</label></td>
		<td class="general"><input type="text" name="slug" id="slug" value="<?= $slug ?? '' ?>"></td>
	</tr>

<?php
	foreach ($this->config->item('supported_languages') as $supported_language)
	{

		echo form_hidden("category_text_id_{$supported_language}", ${"category_text_id_$supported_language"} ?? '');
?>

	<tr>
		<td class="<?= $supported_language ?>">&nbsp;</td>
		<td class="<?= $supported_language ?>"><?= $this->lang->line("main_{$supported_language}") ?></td>
	</tr>
	<tr>
		<td class="<?= $supported_language ?>"><label for="category_name_<?= $supported_language ?>"><?= $this->lang->line('main_name') ?>:</label></td>
		<td class="<?= $supported_language ?>"><input type="text" name="category_name_<?= $supported_language ?>" id="category_name_<?= $supported_language ?>" value="<?= ${"category_name_$supported_language"} ?? '' ?>"></td>
	</tr>
	<tr>
		<td class="<?= $supported_language ?>"><label for="category_description_<?= $supported_language ?>"><?= $this->lang->line('main_description') ?>:</label></td>
		<td class="<?= $supported_language ?>"><textarea name="category_description_<?= $supported_language ?>" id="category_description_<?= $supported_language ?>"><?= ${"category_description_$supported_language"} ?? '' ?></textarea></td>
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
