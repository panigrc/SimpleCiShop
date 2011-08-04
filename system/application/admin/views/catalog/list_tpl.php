<p><?php echo anchor("catalog/view_product/add_product", '<img src="'. base_url() .'/theme/images/add2.png" alt="Προσθήκη Προϊόντος" align="middle"> Προσθήκη Προϊόντος', 'Προσθήκη Προϊόντος'); ?></p>
<table cellspacing=1px cellpadding=0px>
    <tr>
        <th><?php echo $this->lang->line('main_code'); ?></th>
        <th><?php echo $this->lang->line('main_title'); ?></th>
        <th><?php echo $this->lang->line('main_category'); ?></th>
        <th><?php echo $this->lang->line('main_published'); ?></th>
        <th>Stock</th>
        <th><?php echo $this->lang->line('main_price'); ?> (Ελ/Γερμ/Αγγ)</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
<?php foreach($products as $product): ?>
    <tr class="<?php if(@$style=='odd'){ echo 'even'; $style='even';} else{ echo 'odd'; $style='odd'; } ?>">
        <td><?php echo $product['nicename']; ?></td>
        <td><?php echo $product['title_greek']; ?></td>
        <td><?php echo $product['category_text']; ?></td>
        <td><?php echo date("d/m/y", $product['published']); ?></td>
        <td><span id="stock<?php echo $product['productID']; ?>"><?php echo $product['stock']; ?></span> <a href="#" onclick="<?php echo $this->ajax->remote_function(array('update'=>'stock'.$product['productID'], 'url'=>site_url("catalog/ajaxset_stock/" . $product['productID'] . "/". (1) ))); ?>; return false;">+1</a> <a href="#" onclick="<?php echo $this->ajax->remote_function(array('update'=>'stock'.$product['productID'], 'url'=>site_url("catalog/ajaxset_stock/" . $product['productID'] . "/". (-1) ))); ?>; return false;">-1</a></td>
        <td><?php echo $product['price_greek']." / ".$product['price_german']." / ".$product['price_english']; ?></td>
        <td><?php echo anchor("catalog/view_product/edit_product/".$product['productID'], '<img src="'. base_url() .'/theme/images/edit.png" alt="'.$this->lang->line('main_edit').'">', $this->lang->line('main_edit')); ?></td>
        <td><?php echo anchor("catalog/delete_product/".$product['productID'], '<img src="'. base_url() .'/theme/images/delete2.png" alt="'.$this->lang->line('main_delete').'">', array('title' => $this->lang->line('main_delete'), 'onclick' => 'if(!confirm(\'Θελετε σίγουρα να διαγραφεί η εγγραφή;\')) return false;')); ?></td>
    </tr>
<?php endforeach; ?>
</table>
