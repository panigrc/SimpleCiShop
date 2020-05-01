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
	echo form_hidden('category_text_id_greek', $category_text_id_greek ?? '');
	echo form_hidden('category_text_id_german', $category_text_id_german ?? '');
	echo form_hidden('category_text_id_english', $category_text_id_english ?? '');
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
	<tr>
		<td class="greek">&nbsp;</td>
		<td class="greek"><?= $this->lang->line('main_greek') ?></td>
	</tr>
	<tr>
		<td class="greek"><label for="category_name_greek"><?= $this->lang->line('main_name') ?>:</label></td>
		<td class="greek"><input type="text" name="category_name_greek" id="category_name_greek" value="<?= $category_name_greek ?? '' ?>"></td>
	</tr>
	<tr>
		<td class="greek"><?= $this->lang->line('main_description') ?>:</td>
		<td class="greek"><?= $this->myfckeditor->create_editor(array('name' => 'category_description_greek', 'value' => $category_description_greek ?? '')) ?></td>
	</tr>
	<tr>
		<td class="german">&nbsp;</td>
		<td class="german"><?= $this->lang->line('main_german') ?></td>
	</tr>
	<tr>
		<td class="german"><label for="category_name_german"><?= $this->lang->line('main_name') ?>:</label></td>
		<td class="german"><input type="text" name="category_name_german" id="category_name_german" value="<?= $category_name_german ?? '' ?>"></td>
	</tr>
	<tr>
		<td class="german"><?= $this->lang->line('main_description') ?>:</td>
		<td class="german"><?= $this->myfckeditor->create_editor(array('name' => 'category_description_german', 'value' => $category_description_german ?? '')) ?></td>
	</tr>
	<tr>
		<td class="english">&nbsp;</td>
		<td class="english"><?= $this->lang->line('main_english') ?></td>
	</tr>
	<tr>
		<td class="english"><label for="category_name_english"><?= $this->lang->line('main_name') ?>:</label></td>
		<td class="english"><input type="text" name="category_name_english" id="category_name_english" value="<?= $category_name_english ?? '' ?>"></td>
	</tr>
	<tr>
		<td class="english"><?= $this->lang->line('main_description') ?>:</td>
		<td class="english"><?= $this->myfckeditor->create_editor(array('name' => 'category_description_english', 'value' => $category_description_english ?? '')) ?></td>
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
