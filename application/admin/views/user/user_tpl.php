<p><?php echo anchor("user/view_user/add_user", '<img src="'. base_url() .'/theme/images/add2.png" alt="Προσθήκη Χρήστη" align="middle"> Προσθήκη Χρήστη', 'Προσθήκη Χρήστη'); ?></p>
<?php
    echo form_open("user/".$action);
    echo form_hidden('userID',@$userID);
?>
<table>
<tr>
    <td class="general">Κωδικός:</td>
    <td class="general"><input type="text" name="user_code" id="user_code" value="<?php echo @$user_code; ?>"></td>
</tr>
<tr>
    <td class="general">Όνομα:</td>
    <td class="general"><input type="text" name="user_name" id="user_name" value="<?php echo @$user_name; ?>"></td>
</tr>
<tr>
    <td class="general">Επώνυμο:</td>
    <td class="general"><input type="text" name="user_surname" id="user_surname" value="<?php echo @$user_surname; ?>"></td>
</tr>
<tr>
    <td class="general">Email:</td>
    <td class="general"><input type="text" name="user_email" id="user_email" value="<?php echo @$user_email; ?>"></td>
</tr>
<tr>
    <td class="general">Url:</td>
    <td class="general"><input type="text" name="user_url" id="user_url" value="<?php echo @$user_url; ?>"></td>
</tr>
<tr>
    <td class="general">Ημ. Γένησης:</td>
    <td class="general"><input type="text" name="user_birthdate" id="user_birthdate" value="<?php echo date("d/m/y", @$user_birthdate); ?>"></td>
</tr>
<tr>
    <td class="general">Διεύθυνση:</td>
    <td class="general"><input type="text" name="user_address" id="user_address" value="<?php echo @$user_address; ?>"></td>
</tr>
<tr>
    <td class="general">Πόλη:</td>
    <td class="general"><input type="text" name="user_city" id="user_city" value="<?php echo @$user_city; ?>"></td>
</tr>
<tr>
    <td class="general">Ταχ. Κώδικας:</td>
    <td class="general"><input type="text" name="user_zip" id="user_zip" value="<?php echo @$user_zip; ?>"></td>
</tr>
<tr>
    <td class="general">Χώρα:</td>
    <td class="general"><input type="text" name="user_country" id="user_country" value="<?php echo @$user_country; ?>"></td>
</tr>
<tr>
    <td class="general">Τηλέφωνο:</td>
    <td class="general"><input type="text" name="user_phone" id="user_phone" value="<?php echo @$user_phone; ?>"></td>
</tr>
<tr>
    <td class="general">Γλώσσα:</td>
    <td class="general"><input type="text" name="user_language" id="user_language" value="<?php echo @$user_language; ?>"></td>
</tr>
<tr>
    <td class="general">Εγγεγραμμένος:</td>
    <td class="general"><input type="text" name="user_registered" id="user_registered" value="<?php echo date("d/m/y", @$user_registered); ?>"></td>
</tr>
<tr>
    <td class="general">Αστέρια:</td>
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
