<?php
	echo form_open_multipart(sprintf('admin/catalog/%s', $action ?? ''));
	echo form_hidden('product_id', $product_id ?? '');

	function printOptions($arr, $product_categories, $level=0) {
		$obj =& get_instance();
		foreach($arr as $item => $key){
?>
	<span style="padding-left:<?= $level+5 ?>px;">
		<label for="category-<?= $item ?>">
			<input type="checkbox" value="<?= $item ?>" <?= in_array((string) $item, $product_categories, TRUE) ? " checked='checked'" : '' ?> name="product_categories[]" id="category-<?= $item ?>"/>
			<?= $obj->category_model->get_category_name($item) ?>
		</label>
	</span>
			<br />
<?php
			printOptions($key, $product_categories, $level+1);
		}
	}
?>
<table>
<tr>
	<td class="general"><?= $this->lang->line('main_category') ?>:</td>
	<td class="general">
<?php
printOptions($categories_arr ?? [], $product_categories ?? []);
?>
	</td>
</tr>
<tr>
	<td class="general"><label for="slug">Nice name:</label></td>
	<td class="general"><input type="text" name="slug" id="slug" value="<?= $slug ?? '' ?>"></td>
</tr>
<tr>
	<td class="general"><label for="stock">Stock:</label></td>
	<td class="general"><input type="text" name="stock" id="stock" value="<?= $stock ?? '' ?>"></td>
</tr>
<?php
	foreach($all_meta ?? [] as $key => $meta_values) :
?>
<tr>
	<td class="general"><label for="product_meta_value-<?= $key ?>">Meta:</label></td>
	<td class="general">
	<?= $key ?><input type="hidden" name="product_meta_keys[]" id="product_meta_key-<?= $key ?>" value="<?= $key ?>" />
	<select name="product_meta_values[]" id="product_meta_value-<?= $key ?>">
		<option value=""></option>
<?php
		foreach($meta_values as $num => $value) :
?>
		<option value="<?= $value ?>" <?= (isset($product_meta, $product_meta[$key]) && $value === $product_meta[$key]) ? 'selected' : '' ?> >
			<?= $value ?>
		</option>
<?php
		endforeach;
?>
	</select>
	</td>
</tr>
<?php
	endforeach;
?>
<tr>
	<td class="general">Meta:</td>
	<td class="general">
		<label for="product_meta_key_new">Key:</label>
		<input type="text" name="product_meta_keys[]" id="product_meta_key_new" />
		<label for="product_meta_value_new">Value:</label>
		<input type="text" name="product_meta_values[]" id="product_meta_value_new" />
	</td>
</tr>

<?php
	foreach ($this->config->item('supported_languages') as $supported_language)
	{
		echo form_hidden("product_text_id_{$supported_language}", ${"product_text_id_$supported_language"} ?? '');
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
	<td class="<?= $supported_language ?>"><label for="description_<?= $supported_language ?>"><?= $this->lang->line('main_description') ?>:</label></td>
	<td class="<?= $supported_language ?>"><textarea name="description_<?= $supported_language ?>" id="description_<?= $supported_language ?>"><?= ${"description_$supported_language"} ?? '' ?></textarea></td>
</tr>
<tr>
	<td class="<?= $supported_language ?>"><label for="price_old_<?= $supported_language ?>"><?= $this->lang->line('main_price_old') ?>:</label></td>
	<td class="<?= $supported_language ?>"><input type="text" name="price_old_<?= $supported_language ?>" id="price_old_<?= $supported_language ?>" value="<?= ${"price_old_$supported_language"} ?? '' ?>"></td>
</tr>
<tr>
	<td class="<?= $supported_language ?>"><label for="price_<?= $supported_language ?>"><?= $this->lang->line('main_price') ?>:</label></td>
	<td class="<?= $supported_language ?>"><input type="text" name="price_<?= $supported_language ?>" id="price_<?= $supported_language ?>" value="<?= ${"price_$supported_language"} ?? '' ?>"></td>
</tr>
<?php } ?>
<?php
	$images = '';
	foreach($images_arr ?? [] as $current) :
?>
<tr>
	<td class="general">
	<a href="<?= base_url() . $current['big'] ?>">
		<img src="<?= base_url() . $current['thumb'] ?>" alt="<?= $current['title'] ?>">
		<br>
		<?= $current['title'] ?>
	</a>
	</td>
	<td class="general">
		<div>
			<label for="delete_image<?= $current['product_image_id'] ?>"><?= $this->lang->line('main_delete') ?>;</label>
			<input type="checkbox" name="images[<?= $current['product_image_id'] ?>][delete]" id="delete_image<?= $current['product_image_id'] ?>" value="1">
		</div>
		<div>
			<label for="main_image<?= $current['product_image_id'] ?>"><?= $this->lang->line('main_main_image') ?>;</label>
			<input type="checkbox" name="images[<?= $current['product_image_id'] ?>][main]" id="main_image<?= $current['product_image_id'] ?>" <?= (int) $current['main'] === 1 ? 'checked' : '' ?> value="1">
		</div>
	</td>
</tr>
<?php
		endforeach;
?>
<tr>
	<td class="general"><?= $this->lang->line('main_add_images') ?>:</td>
	<td class="general">
		<div id="add_images">
			<input type="file" name="new_images[]" multiple size="20"/>
		</div>
	</td>
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
