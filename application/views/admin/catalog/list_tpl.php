<p>
    <?php echo anchor('admin/catalog/view_product/add_product', sprintf('<i class="fas fa-plus-circle"></i> %s', $this->lang->line('main_create_product'))); ?>
</p>
<table cellspacing=1px cellpadding=0px>
    <tr>
        <th><?php echo $this->lang->line('main_code'); ?></th>
        <th><?php echo $this->lang->line('main_title'); ?></th>
        <th><?php echo $this->lang->line('main_category'); ?></th>
        <th><?php echo $this->lang->line('main_published'); ?></th>
        <th><?php echo $this->lang->line('main_stock'); ?></th>
        <th><?php echo $this->lang->line('main_price'); ?> (Ελ/Γερμ/Αγγ)</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
	<?php foreach ($products as $product): ?>
        <tr class="<?php if (@$style === 'odd') {
			echo 'even';
			$style = 'even';
		} else {
			echo 'odd';
			$style = 'odd';
		} ?>">
            <td><?php echo $product['nicename']; ?></td>
            <td><?php echo $product['title_greek']; ?></td>
            <td><?php echo $product['category_text']; ?></td>
            <td><?php echo date("d/m/y", $product['published']); ?></td>
            <td>
                <span id="stock<?php echo $product['product_id']; ?>"><?php echo $product['stock']; ?></span>
				<?php
                    echo anchor(
                            sprintf("admin/catalog/set_stock/%s/1", $product['product_id']),
                            '<i class="fas fa-plus-square"></i>'
                    );
				?>
				<?php
                    echo anchor(
                            sprintf("admin/catalog/set_stock/%s/-1", $product['product_id']),
                            '<i class="fas fa-minus-square"></i>'
                    );
				?>
            </td>
            <td><?php echo $product['price_greek'] . " / " . $product['price_german'] . " / " . $product['price_english']; ?></td>
            <td><?php echo anchor("admin/catalog/view_product/edit_product/" . $product['product_id'], '<i class="fas fa-edit"></i>'); ?></td>
            <td>
                <?php
                    echo anchor(
                            "admin/catalog/delete_product/" . $product['product_id'],
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
