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
            <td><?php echo str_repeat("-", $level) . " " . $obj->category_model->get_category_name($item); ?></td>
            <td><?php echo anchor("admin/category/view_category/edit_category/" . $item, '<img src="' . base_url() . '/theme/images/edit.png" alt="' . $obj->lang->line('main_edit') . '">', $obj->lang->line('main_edit')); ?></td>
        </tr>
<?php
		printCategories($key, $level + 1, $style);
	}
}

?>

<p>
	<?php echo anchor('admin/category/view_category/add_category', sprintf('<img src="%s/theme/images/add2.png" align="middle"> %s', base_url(), $this->lang->line('main_create_category'))); ?>
</p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th><?php echo $this->lang->line('main_category'); ?></th>
        <th>&nbsp;</th>
    </tr>
	<?php printCategories($categories_arr); ?>
</table>
