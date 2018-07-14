<?php
    echo form_open("coupon/".$action);
?>
<table cellspacing=1 cellpadding=0>
<tr>
    <td class="general">Λήγει</td>
    <td class="general">
        <select name="expires">
            <option value="<?php echo time() + (7 * 24 * 60 * 60); ?>">Σε 1 εβδομάδα</option>
            <option value="<?php echo time() + (30 * 24 * 60 * 60); ?>">Σε 1 μήνα</option>
            <option value="<?php echo time() + (6 * 30 * 24 * 60 * 60); ?>">Σε 1 εξάμηνο</option>
            <option value="<?php echo time() + (12 * 30 * 24 * 60 * 60); ?>">Σε 1 χρόνο</option>
        </select>
    </td>
</tr>
<tr>
    <td class="general">Έκπτωση %</td>
    <td class="general"><input type="text" name="discount" /></td>
</tr>
<tr>
    <td class="general">Λήγει</td>
    <td class="general">
        <select name="type">
            <option value="1">Μιας Χρήσης</option>
            <option value="2">Πολλαπλών Χρήσεων</option>
        </select>
    </td>
</tr>
<tr>
    <td class="general">String μιάς χρήσης</td>
    <td class="general"><input type="text" name="one_time_string" /></td>
</tr>
<tr>
    <td class="general">Αριθμός που θα παραχθούν</td>
    <td class="general"><input type="text" name="generation_number" /></td>
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
