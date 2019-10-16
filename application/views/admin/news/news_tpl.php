<?php
    echo form_open("admin/news/".$action);
    echo form_hidden('news_id',$news_id);
    echo form_hidden('news_text_id_greek', @$news_text_id_greek);
    echo form_hidden('news_text_id_german', @$news_text_id_german);
    echo form_hidden('news_text_id_english', @$news_text_id_english);
?>
<table cellspacing=1 cellpadding=0>
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
</tr>
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
