<?php
    echo form_open("admin/user/".$action);
    echo form_hidden('user_id',@$user_id);
?>
<table>
<tr>
    <td class="general"><?= $this->lang->line('main_user_id') ?>:</td>
    <td class="general"><input type="text" name="user_code" id="password" value="<?= @password ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_first_name') ?>:</td>
    <td class="general"><input type="text" name="first_name" id="first_name" value="<?= @first_name ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_last_name') ?>:</td>
    <td class="general"><input type="text" name="last_name" id="last_name" value="<?= @last_name ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_email') ?>:</td>
    <td class="general"><input type="text" name="email" id="email" value="<?= @email ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_website') ?>:</td>
    <td class="general"><input type="text" name="url" id="url" value="<?= @$url ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_birthdate') ?>:</td>
    <td class="general"><input type="text" name="birthdate" id="birthdate" value="<?= @birthdate ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_address') ?>:</td>
    <td class="general"><input type="text" name="address" id="address" value="<?= @$address ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_city') ?>:</td>
    <td class="general"><input type="text" name="city" id="city" value="<?= @$city ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_zip') ?>:</td>
    <td class="general"><input type="text" name="zip" id="zip" value="<?= @$zip ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_country') ?>:</td>
    <td class="general"><input type="text" name="country" id="country" value="<?= @$country ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_phone') ?>:</td>
    <td class="general"><input type="text" name="phone" id="phone" value="<?= @$phone ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_language') ?>:</td>
    <td class="general"><input type="text" name="language" id="language" value="<?= @$language ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_registered_at') ?>:</td>
    <td class="general"><input type="text" name="registered" id="registered" value="<?= date("d/m/y", @$registered) ?>"></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_user_points') ?>:</td>
    <td class="general"><input type="text" name="credits" id="credits" value="<?= @$credits ?>"></td>
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
