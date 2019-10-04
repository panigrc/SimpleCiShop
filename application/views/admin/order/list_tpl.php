<p>
    &nbsp;
</p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th>&nbsp;</th>
        <th><?php echo $this->lang->line('main_order_id'); ?></th>
        <th><?php echo $this->lang->line('main_order_user'); ?></th>
        <th><?php echo $this->lang->line('main_order_products'); ?></th>
        <th><?php echo $this->lang->line('main_order_created_at'); ?></th>
        <th><?php echo $this->lang->line('main_order_status'); ?></th>
        <th><?php echo $this->lang->line('main_shipping_express'); ?></th>
        <th><?php echo $this->lang->line('main_shipping_to_door'); ?></th>
        <th><?php echo $this->lang->line('main_shipping_cash_on_delivery'); ?></th>
        <th><?php echo $this->lang->line('main_order_price'); ?></th>
        <th><?php echo $this->lang->line('main_order_questionnaire'); ?></th>
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
            <td><?php echo $order['order_id']; ?></td>
            <td><?php echo $order['user_id']; ?>
                <div style="display: none;" id="user_description<?php echo $order['order_id']; ?>"></div>
            </td>
            <td>
                <div style="display: none;" id="products<?php echo $order['order_id']; ?>">
            </td>
            <td><?php echo date("H:i d/m/y", $order['created']); ?></td>
            <td>
                <span id="status<?php echo $order['order_id']; ?>"><?php echo $order['status']; ?></span>
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
            <td><?php echo $order['shipment_express']; ?></td>
            <td><?php echo $order['shipment_to_door']; ?></td>
            <td><?php echo $order_type[$order['shipment_cash_on_delivery']]; ?></td>
            <td><?php echo $order['price']; ?></td>
            <td><?php echo nl2br($order['questionnaire']); ?></td>
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
