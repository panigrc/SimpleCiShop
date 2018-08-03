<p><?php echo anchor("order/view_order/add_order", '<img src="'. base_url() .'/theme/images/add2.png" alt="Προσθήκη Παραγγελίας" align="middle"> Προσθήκη Παραγγελίας', 'Προσθήκη Παραγγελίας'); ?></p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th>&nbsp;</th>
        <th>id</th>
        <th>Χρήστης</th>
        <th>Προϊόντα</th>
        <th>Εγγραφή</th>
        <th>Κατάσταση</th>
        <th>Εξπρές</th>
        <th>Στην πόρτα</th>
        <th>Αντικαταβολή</th>
        <th>Τιμή</th>
        <th>Ερωτηματολόγιο</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
<?php $order_type = array('0'=>"Τίποτα", '1'=>"Αντικαταβολή", '2'=>"Paypal", '3'=>"Κατάθεση"); ?>
<?php foreach($orders as $order): ?>
    <tr class="<?php if(@$style === 'odd'){ echo 'even'; $style='even';} else{ echo 'odd'; $style='odd'; } ?>">
        <td><a href="#" onclick="<?php echo $this->ajax->remote_function(array('update'=>'user_description'.$order['order_id'], 'url'=>site_url("order/ajaxget_user/" . $order['user_id'] ))); ?>; <?php echo $this->ajax->remote_function(array('update'=>'products'.$order['order_id'], 'url'=>site_url("order/ajaxget_products/" . $order['order_id'] ."/". $order['user_id'] ))); ?>; <?php echo $this->ajax->visual_effect('toggle_blind','user_description'.$order['order_id']) ?>; <?php echo $this->ajax->visual_effect('toggle_blind','products'.$order['order_id']) ?>; return FALSE;">Λεπτομέρειες</a></td>
        <td><?php echo $order['order_id']; ?></td>
        <td><?php echo $order['user_id']; ?><div style="display: none;" id="user_description<?php echo $order['order_id']; ?>"></div></td>
        <td><div style="display: none;" id="products<?php echo $order['order_id']; ?>"></td>
        <td><?php echo date("H:i d/m/y", $order['date_created']); ?></td>
        <td><span id="status<?php echo $order['order_id']; ?>"><?php echo $order['status']; ?></span> <a href="#" onclick="<?php echo $this->ajax->remote_function(array('update'=>'status'.$order['order_id'], 'url'=>site_url("order/ajaxset_status/" . $order['order_id'] . "/". 2 ))); ?>; return FALSE;">Αλλαγή</a> <a href="#" onclick="<?php echo $this->ajax->remote_function(array('update'=>'status'.$order['order_id'], 'url'=>site_url("order/ajaxset_status/" . $order['order_id'] . "/". 1 ))); ?>; return FALSE;">Αλλαγή</a></td>
        <td><?php echo $order['shipment_express']; ?></td>
        <td><?php echo $order['shipment_to_door']; ?></td>
        <td><?php echo $order_type[$order['shipment_cash_on_delivery']]; ?></td>
        <td><?php echo $order['price']; ?></td>
        <td><?php echo nl2br($order['questionnaire']); ?></td>
        <td><?php echo anchor("order/view_order/".$order['order_id']."/".$order['user_id'], '<img src="'. base_url() .'/theme/images/print.png" alt="">', "Εκτύπωση"); ?></td>
        <td><?php echo anchor("order/delete_order/".$order['order_id'], '<img src="'. base_url() .'/theme/images/delete2.png" alt="'.$this->lang->line('main_delete').'">', array('title' => $this->lang->line('main_delete'), 'onclick' => 'if( ! confirm(\'Θελετε σίγουρα να διαγραφεί η εγγραφή;\')) return FALSE;')); ?></td>
    </tr>
<?php endforeach; ?>
</table>
