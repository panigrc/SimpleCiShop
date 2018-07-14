<?php
    echo form_open("news/".$action);
    echo form_hidden('newsID',$newsID);
    echo form_hidden('news_textID_greek', @$news_textID_greek);
    echo form_hidden('news_textID_german', @$news_textID_german);
    echo form_hidden('news_textID_english', @$news_textID_english);
?>
<table cellspacing=1 cellpadding=0>
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
</tr>
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
