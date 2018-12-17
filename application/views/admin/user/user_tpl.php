<p>
	<?php echo anchor('admin/user/view_user/add_user', sprintf('<i class="fas fa-plus-circle"></i> %s', $this->lang->line('main_create_user'))); ?>
</p>
<?php
    echo form_open("user/".$action);
    echo form_hidden('user_id',@$user_id);
?>
<table>
<tr>
    <td class="general"><?php echo $this->lang->line('main_user_id'); ?>:</td>
    <td class="general"><input type="text" name="user_code" id="user_code" value="<?php echo @$user_code; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_name'); ?>:</td>
    <td class="general"><input type="text" name="user_name" id="user_name" value="<?php echo @$user_name; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_user_surname'); ?>:</td>
    <td class="general"><input type="text" name="user_surname" id="user_surname" value="<?php echo @$user_surname; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_email'); ?>:</td>
    <td class="general"><input type="text" name="user_email" id="user_email" value="<?php echo @$user_email; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_website'); ?>:</td>
    <td class="general"><input type="text" name="user_url" id="user_url" value="<?php echo @$user_url; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_birthdate'); ?>:</td>
    <td class="general"><input type="text" name="user_birthdate" id="user_birthdate" value="<?php echo date("d/m/y", @$user_birthdate); ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_address'); ?>:</td>
    <td class="general"><input type="text" name="user_address" id="user_address" value="<?php echo @$user_address; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_city'); ?>:</td>
    <td class="general"><input type="text" name="user_city" id="user_city" value="<?php echo @$user_city; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_zip'); ?>:</td>
    <td class="general"><input type="text" name="user_zip" id="user_zip" value="<?php echo @$user_zip; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_country'); ?>:</td>
    <td class="general"><input type="text" name="user_country" id="user_country" value="<?php echo @$user_country; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_phone'); ?>:</td>
    <td class="general"><input type="text" name="user_phone" id="user_phone" value="<?php echo @$user_phone; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_language'); ?>:</td>
    <td class="general"><input type="text" name="user_language" id="user_language" value="<?php echo @$user_language; ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_user_registered_at'); ?>:</td>
    <td class="general"><input type="text" name="user_registered" id="user_registered" value="<?php echo date("d/m/y", @$user_registered); ?>"></td>
</tr>
<tr>
    <td class="general"><?php echo $this->lang->line('main_user_points'); ?>:</td>
    <td class="general"><input type="text" name="user_stars" id="user_stars" value="<?php echo @$user_stars; ?>"></td>
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
