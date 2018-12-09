<p>
	<?php echo anchor('admin/coupon/view_coupon/add_coupon', sprintf('<img src="%s/theme/images/add2.png" align="middle"> %s', base_url(), $this->lang->line('main_create_coupon'))); ?>
</p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th><?php echo $this->lang->line('main_coupon_id'); ?></th>
        <th><?php echo $this->lang->line('main_coupon_uuid'); ?></th>
        <th><?php echo $this->lang->line('main_coupon_expiration_date'); ?></th>
        <th><?php echo $this->lang->line('main_coupon_discount'); ?></th>
        <th><?php echo $this->lang->line('main_coupon_type'); ?></th>
        <th><?php echo $this->lang->line('main_coupon_redeemed'); ?></th>
        <th>&nbsp;</th>
    </tr>
	<?php foreach ($coupons as $coupon): ?>
        <tr class="<?php if (@$style === 'odd') {
			echo 'even';
			$style = 'even';
		} else {
			echo 'odd';
			$style = 'odd';
		} ?>">
            <td><?php echo $coupon['coupon_id']; ?></td>
            <td><?php echo $coupon['coupon_number']; ?></td>
            <td><?php echo date("d/m/y", $coupon['expires']); ?></td>
            <td><?php echo $coupon['discount']; ?></td>
            <td><?php echo $coupon['type']; ?></td>
            <td><?php echo $coupon['used']; ?></td>
            <td>
				<?php
                    echo anchor(
                        "admin/coupon/delete_coupon/" . $coupon['coupon_id'],
                        sprintf("<img src='%s/theme/images/delete2.png' alt='%s'>",  base_url(), $this->lang->line('main_delete')),
                        array(
                                'title' => $this->lang->line('main_delete'),
                                'onclick' => sprintf("if( ! confirm('%s')) return false;", $this->lang->line('main_assert_delete_entry'))
                        )
                    );
				?>
            </td>
        </tr>
	<?php endforeach; ?>
</table>
