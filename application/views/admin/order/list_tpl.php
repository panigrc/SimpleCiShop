<p>
	&nbsp;
</p>
<table>
	<tr>
		<th>&nbsp;</th>
		<th><?= $this->lang->line('main_order_id') ?></th>
		<th><?= $this->lang->line('main_order_user') ?></th>
		<th><?= $this->lang->line('main_order_products') ?></th>
		<th><?= $this->lang->line('main_order_created_at') ?></th>
		<th><?= $this->lang->line('main_order_status') ?></th>
		<th><?= $this->lang->line('main_shipping_express') ?></th>
		<th><?= $this->lang->line('main_shipping_to_door') ?></th>
		<th><?= $this->lang->line('main_shipping_cash_on_delivery') ?></th>
		<th><?= $this->lang->line('main_order_price') ?></th>
		<th><?= $this->lang->line('main_order_questionnaire') ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<?php
		$order_type = [
			Order_model::PAYMENT_TYPE_NONE             => $this->lang->line('main_payment_none'),
			Order_model::PAYMENT_TYPE_CASH_ON_DELIVERY => $this->lang->line('main_shipping_cash_on_delivery'),
			Order_model::PAYMENT_TYPE_PAYPAL           => $this->lang->line('main_payment_paypal'),
			Order_model::PAYMENT_TYPE_BANK_TRANSFER    => $this->lang->line('main_payment_bank_transfer'),
		];
	?>
	<?php foreach ($orders ?? [] as $order): ?>
		<tr class="<?php if ($style ?? null === 'odd') {
			echo 'even';
			$style = 'even';
		} else {
			echo 'odd';
			$style = 'odd';
		} ?>">
			<td>&nbsp;
			</td>
			<td><?= $order['order_id'] ?></td>
			<td><?= $order['user_id'] ?>
				<div style="display: none;" id="user_description<?= $order['order_id'] ?>"></div>
			</td>
			<td>
				<div style="display: none;" id="products<?= $order['order_id'] ?>">
			</td>
			<td><?= date('H:i d/m/y', $order['created']) ?></td>
			<td>
				<span id="status<?= $order['order_id'] ?>"><?= $order['status'] ?></span>
				<?php
					echo anchor(
							sprintf('admin/order/set_status/%s/2', $order['order_id']),
							$this->lang->line('main_modify')
					);
				?>

				<?php
					echo anchor(
							sprintf('admin/order/set_status/%s/1', $order['order_id']),
							$this->lang->line('main_modify')
					);
				?>
			</td>
			<td><?= $order['shipment_express'] ?></td>
			<td><?= $order['shipment_to_door'] ?></td>
			<td><?= $order_type[(int) $order['shipment_cash_on_delivery']] ?></td>
			<td><?= $order['price'] ?></td>
			<td><?= nl2br($order['questionnaire']) ?></td>
			<td>
				<?php echo anchor(
						'admin/order/view_order/'. $order['order_id'] . '/' . $order['user_id'],
						'<i class="fas fa-print"></i>'
				);
				?>
			</td>
			<td>
				<?php
					echo anchor(
						'admin/order/delete_order/' . $order['order_id'],
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
