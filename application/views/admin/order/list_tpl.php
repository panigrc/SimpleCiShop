<p>
	<?php echo anchor('admin/order/view_order/add_order', sprintf('<img src="%s/theme/images/add2.png" align="middle"> %s', base_url(), $this->lang->line('main_create_order'))); ?>
</p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th>&nbsp;</th>
        <th><?php echo $this->lang->line('main_order_id'); ?></th>
        <th><?php echo $this->lang->line('main_order_user'); ?></th>
        <th><?php echo $this->lang->line('main_order_products'); ?></th>
        <th><?php echo $this->lang->line('main_order_created_at'); ?></th>
        <th><?php echo $this->lang->line('main_order_status'); ?></th>
        <th><?php echo $this->lang->line('main_shipment_express'); ?></th>
        <th><?php echo $this->lang->line('main_shipment_to_door'); ?>Στην </th>
        <th><?php echo $this->lang->line('main_shipment_cash_on_delivery'); ?></th>
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
            <td><a href="#"
                   onclick="<?php echo $this->ajax->remote_function(array('update' => 'user_description' . $order['order_id'], 'url' => site_url("admin/order/ajaxget_user/" . $order['user_id']))); ?>; <?php echo $this->ajax->remote_function(array('update' => 'products' . $order['order_id'], 'url' => site_url("admin/order/ajaxget_products/" . $order['order_id'] . "/" . $order['user_id']))); ?>; <?php echo $this->ajax->visual_effect('toggle_blind', 'user_description' . $order['order_id']) ?>; <?php echo $this->ajax->visual_effect('toggle_blind', 'products' . $order['order_id']) ?>; return false;"><?php echo $this->lang->line('main_details'); ?></a>
            </td>
            <td><?php echo $order['order_id']; ?></td>
            <td><?php echo $order['user_id']; ?>
                <div style="display: none;" id="user_description<?php echo $order['order_id']; ?>"></div>
            </td>
            <td>
                <div style="display: none;" id="products<?php echo $order['order_id']; ?>">
            </td>
            <td><?php echo date("H:i d/m/y", $order['date_created']); ?></td>
            <td><span id="status<?php echo $order['order_id']; ?>"><?php echo $order['status']; ?></span> <a href="#"
                                                                                                             onclick="<?php echo $this->ajax->remote_function(array('update' => 'status' . $order['order_id'], 'url' => site_url("admin/order/ajaxset_status/" . $order['order_id'] . "/" . 2))); ?>; return false;"><?php echo $this->lang->line('main_modify'); ?></a>
                <a href="#"
                   onclick="<?php echo $this->ajax->remote_function(array('update' => 'status' . $order['order_id'], 'url' => site_url("admin/order/ajaxset_status/" . $order['order_id'] . "/" . 1))); ?>; return false;"><?php echo $this->lang->line('main_modify'); ?></a>
            </td>
            <td><?php echo $order['shipment_express']; ?></td>
            <td><?php echo $order['shipment_to_door']; ?></td>
            <td><?php echo $order_type[$order['shipment_cash_on_delivery']]; ?></td>
            <td><?php echo $order['price']; ?></td>
            <td><?php echo nl2br($order['questionnaire']); ?></td>
            <td>
            	<?php echo anchor(
            	        'admin/order/view_order/'. $order['order_id'] . "/" . $order['user_id'],
                        sprintf('<img src="%s/theme/images/print.png" align="middle"> %s', base_url(), $this->lang->line('main_print'))
                ); 
            	?>
            </td>
            <td>
				<?php
                    echo anchor(
                        "admin/order/delete_order/" . $order['order_id'],
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
