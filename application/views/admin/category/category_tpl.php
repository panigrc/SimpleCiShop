<?php
    
    function printOptions($arr, $category_id, $level=0) {
        $obj =& get_instance();
        foreach($arr as $item => $key){
?>
    <option value="<?php echo $item;?>" <?php echo $item === $category_id ? "selected" : ""; ?>><?php echo str_repeat("-", $level) ." ". $obj->category_model->get_category_name($item); ?></option>
<?php
            printOptions($key, $category_id, $level+1);
        }
    }
?>
<?php
    echo form_open("admin/category/".$action);
    echo form_hidden('category_id',@$category_id);
    echo form_hidden('category_text_id_greek', @$category_text_id_greek);
    echo form_hidden('category_text_id_german', @$category_text_id_german);
    echo form_hidden('category_text_id_english', @$category_text_id_english);    
?>
<table>
<tr>
    <td><?php echo $this->lang->line('main_category'); ?>:</td>
    <td>
    <select name="parent_category_id" id="parent_category_id">
        <option value="0"></option>
<?php
printOptions($categories_arr, @$parent_category_id);
?>
    </select>
    </td>
</tr>
<tr>
    <td class="general">Nicename:</td>
    <td class="general"><input type="text" name="nicename" id="nicename" value="<?php echo @$nicename; ?>"></td>
</tr>
<tr>
    <td class="greek">&nbsp;</td>
    <td class="greek"><?php echo $this->lang->line('main_greek'); ?></td>
</tr>
<tr>
    <td class="greek"><?php echo $this->lang->line('main_name'); ?>:</td>
    <td class="greek"><input type="text" name="category_name_greek" id="category_name_greek" value="<?php echo @$category_name_greek ?>"></td>
</tr>
<tr>
    <td class="greek"><?php echo $this->lang->line('main_description'); ?>:</td>
    <td class="greek"><?php echo $this->myfckeditor->create_editor(array('name' => 'category_description_greek', 'value' => @$category_description_greek)); ?></td>
</tr>
<tr>
    <td class="german">&nbsp;</td>
    <td class="german"><?php echo $this->lang->line('main_german'); ?></td>
</tr>
<tr>
    <td class="german"><?php echo $this->lang->line('main_name'); ?>:</td>
    <td class="german"><input type="text" name="category_name_german" id="category_name_german" value="<?php echo @$category_name_german ?>"></td>
</tr>
<tr>
    <td class="german"><?php echo $this->lang->line('main_description'); ?>:</td>
    <td class="german"><?php echo $this->myfckeditor->create_editor(array('name' => 'category_description_german', 'value' => @$category_description_german)); ?></td>
</tr>
<tr>
    <td class="english">&nbsp;</td>
    <td class="english"><?php echo $this->lang->line('main_english'); ?></td>
</tr>
<tr>
    <td class="english"><?php echo $this->lang->line('main_name'); ?>:</td>
    <td class="english"><input type="text" name="category_name_english" id="category_name_english" value="<?php echo @$category_name_english ?>"></td>
</tr>
<tr>
    <td class="english"><?php echo $this->lang->line('main_description'); ?>:</td>
    <td class="english"><?php echo $this->myfckeditor->create_editor(array('name' => 'category_description_english', 'value' => @$category_description_english)); ?></td>
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
    echo form_close();
?>
