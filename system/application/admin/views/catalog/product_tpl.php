<?php
    echo form_open_multipart("catalog/".$action);
    echo form_hidden('productID',$productID);
    echo form_hidden('product_textID_greek', @$product_textID_greek);
    echo form_hidden('product_textID_german', @$product_textID_german);
    echo form_hidden('product_textID_english', @$product_textID_english);
    
    function printOptions($arr, $product_categories, $level=0) {
        $obj =& get_instance();
        foreach($arr as $item => $key){
?>
    <span style="padding-left:<?php echo $level+5; ?>px;"><label for="category-<?php echo $item;?>"><input type="checkbox" value="<?php echo $item;?>" <?php echo in_array($item, $product_categories) ? " checked='checked'" : ""; ?> name="product_categories[]" id="category-<?php echo $item;?>"/><?php echo $obj->Category_model->getCategoryName($item); ?></label></span><br />
<?php
            printOptions($key, $product_categories, $level+1);
        }
    }
?>
<table cellspacing=1 cellpadding=0>
<tr>
    <td class="general"><?php echo $this->lang->line('main_category'); ?>:</td>
    <td class="general">
<?php
printOptions($categories_arr, $product_categories);
?>
    </td>
</tr>
<tr>
    <td class="general">Nice name:</td>
    <td class="general"><input type="text" name="nicename" id="nicename" value="<?php echo @$nicename; ?>"></td>
</tr>
<tr>
    <td class="general">Stock:</td>
    <td class="general"><input type="text" name="stock" id="stock" value="<?php echo @$stock; ?>"></td>
</tr>
<?php
    foreach($all_meta as $key => $meta_values) :
?>
<tr>
    <td class="general">Meta:</td>
    <td class="general">
    <?php echo $key; ?><input type="hidden" name="product_meta_keys[]" id="product_meta_key-<?php echo $key; ?>" value="<?php echo $key; ?>" />
    <select name="product_meta_values[]" id="product_meta_value-<?php echo $key; ?>">
        <option value=""></option>
<?php
        foreach($meta_values as $num => $value) :
?>
        <option value="<?php echo $value; ?>" <?php echo $value == @$product_meta[$key] ? "selected" : ""; ?>><?php echo $value; ?></option>
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
    <td class="general"><input type="text" name="product_meta_keys[]" id="product_meta_key_new" /><input type="text" name="product_meta_values[]" id="product_meta_value_new" /></td>
</tr>
<tr>
    <td class="greek">&nbsp;</td>
    <td class="greek"><?php echo $this->lang->line('main_greek'); ?></td>
</tr>
<tr>
    <td class="greek"><?php echo $this->lang->line('main_title'); ?>:</td>
    <td class="greek"><input type="text" name="title_greek" id="title_greek" value="<?php echo @$title_greek ?>"></td>
</tr>
<tr>
    <td class="greek"><?php echo $this->lang->line('main_description'); ?>:</td>
    <td class="greek"><?php echo $this->myfckeditor->create_editor(array('name' => 'description_greek', 'value' => @$description_greek)); ?></td>
</tr>
<tr>
    <td class="greek"><?php echo $this->lang->line('main_price_old'); ?>:</td>
    <td class="greek"><input type="text" name="price_old_greek" id="price_old_greek" value="<?php echo @$price_old_greek ?>"></td>
</tr>
<tr>
    <td class="german"><?php echo $this->lang->line('main_price'); ?>:</td>
    <td class="german"><input type="text" name="price_greek" id="price_greek" value="<?php echo @$price_greek ?>"></td>
</tr>
<tr>
    <td class="german">&nbsp;</td>
    <td class="german"><?php echo $this->lang->line('main_german'); ?></td>
</tr>
<tr>    
    <td class="german"><?php echo $this->lang->line('main_title'); ?>:</td>
    <td class="german"><input type="text" name="title_german" id="title_german" value="<?php echo @$title_german ?>"></td>
</tr>
<tr>
    <td class="german"><?php echo $this->lang->line('main_description'); ?>:</td>
    <td class="german"><?php echo $this->myfckeditor->create_editor(array('name' => 'description_german', 'value' => @$description_german)); ?></td>
</tr>
<tr>
    <td class="greek"><?php echo $this->lang->line('main_price_old'); ?>:</td>
    <td class="greek"><input type="text" name="price_old_german" id="price_old_german" value="<?php echo @$price_old_german ?>"></td>
</tr>
<tr>
    <td class="german"><?php echo $this->lang->line('main_price'); ?>:</td>
    <td class="german"><input type="text" name="price_german" id="price_german" value="<?php echo @$price_german ?>"></td>
</tr>
<tr>
    <td class="english">&nbsp;</td>
    <td class="english"><?php echo $this->lang->line('main_english'); ?></td>
</tr>
<tr>    
    <td class="english"><?php echo $this->lang->line('main_title'); ?>:</td>
    <td class="english"><input type="text" name="title_english" id="title_english" value="<?php echo @$title_english ?>"></td>
</tr>
<tr>    
    <td class="english"><?php echo $this->lang->line('main_description'); ?>:</td>
    <td class="english"><?php echo $this->myfckeditor->create_editor(array('name' => 'description_english', 'value' => @$description_english)); ?></td>
</tr>
<tr>
    <td class="english"><?php echo $this->lang->line('main_price_old'); ?>:</td>
    <td class="english"><input type="text" name="price_old_english" id="price_old_english" value="<?php echo @$price_old_greek ?>"></td>
</tr>
<tr>    
    <td class="english"><?php echo $this->lang->line('main_price'); ?>:</td>
    <td class="english"><input type="text" name="price_english" id="price_english" value="<?php echo @$price_english ?>"></td>
</tr>
<?php
    $images="";
    if(!empty($images_arr))
        foreach($images_arr as $current) :
            $images .= $current['product_imageID'] . ",";
?>
<tr>
    <td class="general">
    <a href="<?php echo base_url().$current['big']; ?>"><img src="<?php echo base_url().$current['thumb']; ?>" alt="<?php echo $current['title']; ?>"><?php echo $current['title']; ?></a>
    </td>
    <td class="general">
    <input type="checkbox" name="delete_image<?php echo $current['product_imageID']; ?>" id="delete_image<?php echo $current['product_imageID']; ?>" value="1">
    <?php echo $this->lang->line('main_delete'); ?>;
    <br />
    <input type="checkbox" name="main_image<?php echo $current['product_imageID']; ?>" id="main_image<?php echo $current['product_imageID']; ?>" <?php echo $current['main'] == 1 ? "checked" : "" ?> value="1">
    <?php echo $this->lang->line('main_main_image'); ?>;
    </td>
</tr>
<?php
        endforeach;
?>
<tr>
    <td class="general"><?php echo $this->lang->line('main_add_images'); ?>:</td>
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
    <input type="submit" name="submit_form" id="submit_form" value="<?php echo $this->lang->line('main_save'); ?>">
    <input type="button" name="cancel" id="cancel" value="<?php echo $this->lang->line('main_cancel'); ?>" onclick="history.go(-1)">
    </td>
</tr>
</table>
<?php
    echo form_hidden('images', $images);
    echo form_close();
?>
