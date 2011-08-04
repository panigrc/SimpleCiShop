<p><?php echo anchor("coupon/view_coupon/add_coupon", '<img src="'. base_url() .'/theme/images/add2.png" alt="Προσθήκη Κουπονιών" align="middle"> Προσθήκη Κουπονιών', 'Προσθήκη Κουπονιών'); ?></p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
<?php foreach($coupons as $coupon): ?>
    <tr class="<?php if(@$style=='odd'){ echo 'even'; $style='even';} else{ echo 'odd'; $style='odd'; } ?>">
        <td><?php echo $coupon['couponID']; ?></td>
        <td><?php echo $coupon['coupon_number']; ?></td>
        <td><?php echo date("d/m/y", $coupon['expires']); ?></td>
        <td><?php echo $coupon['discount']; ?></td>
        <td><?php echo $coupon['type']; ?></td>
        <td><?php echo $coupon['used']; ?></td>
        <td><?php echo anchor("coupon/delete_coupon/".$coupon['couponID'], '<img src="'. base_url() .'/theme/images/delete2.png" alt="'.$this->lang->line('main_delete').'">', array('title' => $this->lang->line('main_delete'), 'onclick' => 'if(!confirm(\'Θελετε σίγουρα να διαγραφεί η εγγραφή;\')) return false;')); ?></td>
    </tr>
<?php endforeach; ?>
</table>
