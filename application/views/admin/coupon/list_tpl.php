<p>
	<?= anchor('admin/coupon/view_coupon/add_coupon', sprintf('<i class="fas fa-plus-circle"></i> %s', $this->lang->line('main_create_coupon'))) ?>
</p>
<table>
	<tr>
		<th><?= $this->lang->line('main_coupon_id') ?></th>
		<th><?= $this->lang->line('main_coupon_uuid') ?></th>
		<th><?= $this->lang->line('main_coupon_expiration_date') ?></th>
		<th><?= $this->lang->line('main_coupon_discount') ?></th>
		<th><?= $this->lang->line('main_coupon_type') ?></th>
		<th><?= $this->lang->line('main_coupon_redeemed') ?></th>
		<th>&nbsp;</th>
	</tr>
	<?php foreach ($coupons ?? [] as $coupon): ?>
		<tr class="<?php if ($style ?? null === 'odd') {
			echo 'even';
			$style = 'even';
		} else {
			echo 'odd';
			$style = 'odd';
		} ?>">
			<td><?= $coupon['coupon_id'] ?></td>
			<td><?= $coupon['coupon_number'] ?></td>
			<td><?= date('d/m/y', $coupon['expires']) ?></td>
			<td><?= $coupon['discount'] ?></td>
			<td><?= $coupon['type'] ?></td>
			<td><?= $coupon['used'] ?></td>
			<td>
				<?php
					echo anchor(
						'admin/coupon/delete_coupon/' . $coupon['coupon_id'],
						'<i class="fas fa-trash"></i>',
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
