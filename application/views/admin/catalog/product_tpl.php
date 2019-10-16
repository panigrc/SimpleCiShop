<?php
    echo form_open_multipart("admin/catalog/".$action);
    echo form_hidden('product_id',$product_id);
    echo form_hidden('product_text_id_greek', @$product_text_id_greek);
    echo form_hidden('product_text_id_german', @$product_text_id_german);
    echo form_hidden('product_text_id_english', @$product_text_id_english);

    function printOptions($arr, $product_categories, $level=0) {
        $obj =& get_instance();
        foreach($arr as $item => $key){
?>
    <span style="padding-left:<?= $level+5 ?>px;">
		<label for="category-<?= $item ?>">
			<input type="checkbox" value="<?= $item ?>" <?= in_array($item, $product_categories) ? " checked='checked'" : "" ?> name="product_categories[]" id="category-<?= $item ?>"/>
			<?= $obj->category_model->get_category_name($item) ?>
		</label>
	</span>
			<br />
<?php
            printOptions($key, $product_categories, $level+1);
        }
    }
?>
<table cellspacing=1 cellpadding=0>
<tr>
    <td class="general"><?= $this->lang->line('main_category') ?>:</td>
    <td class="general">
<?php
printOptions($categories_arr, $product_categories);
?>
    </td>
</tr>
<tr>
    <td class="general">Nice name:</td>
    <td class="general"><input type="text" name="slug" id="slug" value="<?= @$slug ?>"></td>
</tr>
<tr>
    <td class="general">Stock:</td>
    <td class="general"><input type="text" name="stock" id="stock" value="<?= @$stock ?>"></td>
</tr>
<?php
    foreach($all_meta as $key => $meta_values) :
?>
<tr>
    <td class="general">Meta:</td>
    <td class="general">
    <?= $key ?><input type="hidden" name="product_meta_keys[]" id="product_meta_key-<?= $key ?>" value="<?= $key ?>" />
    <select name="product_meta_values[]" id="product_meta_value-<?= $key ?>">
        <option value=""></option>
<?php
        foreach($meta_values as $num => $value) :
?>
        <option value="<?= $value ?>" <?= $value === @$product_meta[$key] ? "selected" : "" ?> >
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
		<input type="text" name="product_meta_keys[]" id="product_meta_key_new" />
		<input type="text" name="product_meta_values[]" id="product_meta_value_new" />
	</td>
</tr>
<tr>
    <td class="greek">&nbsp;</td>
    <td class="greek"><?= $this->lang->line('main_greek') ?></td>
</tr>
<tr>
    <td class="greek"><?= $this->lang->line('main_title') ?>:</td>
    <td class="greek"><input type="text" name="title_greek" id="title_greek" value="<?= @$title_greek ?>"></td>
</tr>
<tr>
    <td class="greek"><?= $this->lang->line('main_description') ?>:</td>
    <td class="greek"><?= $this->myfckeditor->create_editor(array('name' => 'description_greek', 'value' => @$description_greek)) ?></td>
</tr>
<tr>
    <td class="greek"><?= $this->lang->line('main_price_old') ?>:</td>
    <td class="greek"><input type="text" name="price_old_greek" id="price_old_greek" value="<?= @$price_old_greek ?>"></td>
</tr>
<tr>
    <td class="german"><?= $this->lang->line('main_price') ?>:</td>
    <td class="german"><input type="text" name="price_greek" id="price_greek" value="<?= @$price_greek ?>"></td>
</tr>
<tr>
    <td class="german">&nbsp;</td>
    <td class="german"><?= $this->lang->line('main_german') ?></td>
</tr>
<tr>
    <td class="german"><?= $this->lang->line('main_title') ?>:</td>
    <td class="german"><input type="text" name="title_german" id="title_german" value="<?= @$title_german ?>"></td>
</tr>
<tr>
    <td class="german"><?= $this->lang->line('main_description') ?>:</td>
    <td class="german"><?= $this->myfckeditor->create_editor(array('name' => 'description_german', 'value' => @$description_german)) ?></td>
</tr>
<tr>
    <td class="greek"><?= $this->lang->line('main_price_old') ?>:</td>
    <td class="greek"><input type="text" name="price_old_german" id="price_old_german" value="<?= @$price_old_german ?>"></td>
</tr>
<tr>
    <td class="german"><?= $this->lang->line('main_price') ?>:</td>
    <td class="german"><input type="text" name="price_german" id="price_german" value="<?= @$price_german ?>"></td>
</tr>
<tr>
    <td class="english">&nbsp;</td>
    <td class="english"><?= $this->lang->line('main_english') ?></td>
</tr>
<tr>
    <td class="english"><?= $this->lang->line('main_title') ?>:</td>
    <td class="english"><input type="text" name="title_english" id="title_english" value="<?= @$title_english ?>"></td>
</tr>
<tr>
    <td class="english"><?= $this->lang->line('main_description') ?>:</td>
    <td class="english"><?= $this->myfckeditor->create_editor(array('name' => 'description_english', 'value' => @$description_english)) ?></td>
</tr>
<tr>
    <td class="english"><?= $this->lang->line('main_price_old') ?>:</td>
    <td class="english"><input type="text" name="price_old_english" id="price_old_english" value="<?= @$price_old_greek ?>"></td>
</tr>
<tr>
    <td class="english"><?= $this->lang->line('main_price') ?>:</td>
    <td class="english"><input type="text" name="price_english" id="price_english" value="<?= @$price_english ?>"></td>
</tr>
<?php
    $images="";
    if( ! empty($images_arr))
        foreach($images_arr as $current) :
            $images .= $current['product_image_id'] . ",";
?>
<tr>
    <td class="general">
    <a href="<?= base_url().$current['big'] ?>">
		<img src="<?= base_url().$current['thumb'] ?>" alt="<?= $current['title'] ?>"><?= $current['title'] ?>
	</a>
    </td>
    <td class="general">
    <input type="checkbox" name="delete_image<?= $current['product_image_id'] ?>" id="delete_image<?= $current['product_image_id'] ?>" value="1">
    <?= $this->lang->line('main_delete') ?>;
    <br />
    <input type="checkbox" name="main_image<?= $current['product_image_id'] ?>" id="main_image<?= $current['product_image_id'] ?>" <?= $current['main'] === 1 ? "checked" : "" ?> value="1">
    <?= $this->lang->line('main_main_image') ?>;
    </td>
</tr>
<?php
        endforeach;
?>
<tr>
    <td class="general"><?= $this->lang->line('main_add_images') ?>:</td>
    <td class="general">
    <div id="add_images">
    <input type="file" name="image_file1" size="20" />
    </div>
    <div id="add_images">
    <input type="file" name="image_file2" size="20" />
    </div>
    <div id="add_images">
    <input type="file" name="image_file3" size="20" />
    </div>
    <div id="add_images">
    <input type="file" name="image_file4" size="20" />
    </div>
    <div id="add_images">
    <input type="file" name="image_file5" size="20" />
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
    echo form_hidden('images', $images);
    echo form_close();
?>
