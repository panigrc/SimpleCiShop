<p>
    &nbsp;
</p>
<table cellpadding=0 cellspacing=1>
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
        $order_type = array(
                '0' => $this->lang->line('main_payment_none'),
                '1' => $this->lang->line('main_order_cash_on_delivery'),
                '2' => $this->lang->line('main_payment_paypal'),
                '3' => $this->lang->line('main_payment_bank_transfer'),
        );
	?>
	<?php foreach ($orders as $order): ?>
        <tr class="<?php if (@$style === 'odd') {
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
            <td><?= date("H:i d/m/y", $order['created']) ?></td>
            <td>
                <span id="status<?= $order['order_id']; ?>"><?= $order['status'] ?></span>
                <?php
                    echo anchor(
                            sprintf("admin/order/set_status/%s/2", $order['order_id']),
                            $this->lang->line('main_modify')
                    );
                ?>

                <?php
                    echo anchor(
                            sprintf("admin/order/set_status/%s/1", $order['order_id']),
                            $this->lang->line('main_modify')
                    );
                ?>
            </td>
            <td><?= $order['shipment_express'] ?></td>
            <td><?= $order['shipment_to_door'] ?></td>
            <td><?= $order_type[$order['shipment_cash_on_delivery']] ?></td>
            <td><?= $order['price'] ?></td>
            <td><?= nl2br($order['questionnaire']) ?></td>
            <td>
            	<?php echo anchor(
            	        'admin/order/view_order/'. $order['order_id'] . "/" . $order['user_id'],
                        '<i class="fas fa-print"></i>'
                );
            	?>
            </td>
            <td>
				<?php
                    echo anchor(
                        "admin/order/delete_order/" . $order['order_id'],
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
