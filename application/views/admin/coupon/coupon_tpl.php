<?php
    echo form_open("admin/coupon/".$action);
?>
<table cellspacing=1 cellpadding=0>
<tr>
    <td class="general"><?= $this->lang->line('main_coupon_expiration_date') ?></td>
    <td class="general">
        <select name="expires">
            <option value="<?= time() + (7 * 24 * 60 * 60); ?>">1 <?= $this->lang->line('main_week') ?></option>
            <option value="<?= time() + (30 * 24 * 60 * 60); ?>">1 <?= $this->lang->line('main_month') ?></option>
            <option value="<?= time() + (6 * 30 * 24 * 60 * 60); ?>">½ <?= $this->lang->line('main_year') ?></option>
            <option value="<?= time() + (12 * 30 * 24 * 60 * 60); ?>">1 <?= $this->lang->line('main_year') ?></option>
        </select>
    </td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_coupon_discount') ?> %</td>
    <td class="general"><input type="text" name="discount" /></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_coupon_expiration_date') ?></td>
    <td class="general">
        <select name="type">
            <option value="1"><?= $this->lang->line('main_coupon_single_use') ?></option>
            <option value="2"><?= $this->lang->line('main_coupon_reusable') ?></option>
        </select>
    </td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_coupon_uuid') ?></td>
    <td class="general"><input type="text" name="<?= $this->lang->line('main_coupon_uuid') ?>" /></td>
</tr>
<tr>
    <td class="general"><?= $this->lang->line('main_coupon_generate_amount') ?></td>
    <td class="general"><input type="text" name="generation_number" /></td>
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
