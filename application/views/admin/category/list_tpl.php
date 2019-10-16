<?php

function printCategories($arr, $level = 0, $style = 'odd')
{
	$obj =& get_instance();
	foreach ($arr as $item => $key)
	{
?>
        <tr class="<?php if (@$style === 'odd') {
			echo 'even';
			$style = 'even';
		} else {
			echo 'odd';
			$style = 'odd';
		} ?>">
            <td><?= str_repeat("-", $level) . " " . $obj->category_model->get_category_name($item) ?></td>
            <td><?= anchor("admin/category/view_category/edit_category/" . $item, '<i class="fas fa-edit"></i>') ?></td>
        </tr>
<?php
		printCategories($key, $level + 1, $style);
	}
}

?>

<p>
	<?= anchor('admin/category/view_category/add_category', sprintf('<i class="fas fa-plus-circle"></i> %s', $this->lang->line('main_create_category'))) ?>
</p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th><?= $this->lang->line('main_category') ?></th>
        <th>&nbsp;</th>
    </tr>
	<?php printCategories($categories_arr); ?>
</table>
