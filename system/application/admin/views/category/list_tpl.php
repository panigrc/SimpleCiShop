<?php

    function printCategories($arr, $level=0, $style='odd') {
        $obj =& get_instance();
        foreach($arr as $item => $key){
?>
    <tr class="<?php if(@$style=='odd'){ echo 'even'; $style='even';} else{ echo 'odd'; $style='odd'; } ?>">
        <td><?php echo str_repeat("-", $level) ." ". $obj->Category_model->getCategoryName($item); ?></td>
        <td><?php echo anchor("category/view_category/edit_category/".$item, '<img src="'. base_url() .'/theme/images/edit.png" alt="'.$obj->lang->line('main_edit').'">', $obj->lang->line('main_edit')); ?></td>
    </tr>
<?php
            printCategories($key, $level+1, $style);
        }
    }
?>

<p><?php echo anchor("category/view_category/add_category", '<img src="'. base_url() .'/theme/images/add2.png" alt="Προσθήκη Νέου" align="middle"> Προσθήκη Κατηγορίας', 'Προσθήκη Κατηγορίας'); ?></p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th><?php echo $this->lang->line('main_category'); ?></th>
        <th>&nbsp;</th>
    </tr>
<?php printCategories($categories_arr); ?>
</table>
