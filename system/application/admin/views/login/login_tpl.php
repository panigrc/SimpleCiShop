<?php
    echo form_open("login");
?>
<table cellspacing=1 cellpadding=0>
<tr>
    <td class="greek"><?php echo $this->lang->line('main_username'); ?>:</td>
    <td class="greek"><input type="text" name="username" id="username" value=""></td>
</tr>
<tr>
    <td class="greek"><?php echo $this->lang->line('main_password'); ?>:</td>
    <td class="greek"><input type="password" name="password" id="password" value=""></td>
</tr>
</tr>
    <td>&nbsp;</td>
    <td>
    <input type="submit" name="submit_form" id="submit_form" value="<?php echo $this->lang->line('main_submit'); ?>">
    </td>
</tr>
</table>
<?php
    echo form_close();
?>
