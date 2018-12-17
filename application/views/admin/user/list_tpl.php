<p>
	<?php echo anchor('admin/user/view_user/add_user', sprintf('<i class="fas fa-plus-circle"></i> %s', $this->lang->line('main_create_user'))); ?>
</p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th><?php echo $this->lang->line('main_user_id'); ?></th>
        <th><?php echo $this->lang->line('main_user_first_name'); ?></th>
        <th><?php echo $this->lang->line('main_user_last_name'); ?></th>
        <th><?php echo $this->lang->line('main_user_registered_at'); ?></th>
        <th><?php echo $this->lang->line('main_user_points'); ?></th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
<?php foreach($users as $user): ?>
    <tr class="<?php if(@$style === 'odd'){ echo 'even'; $style='even';} else{ echo 'odd'; $style='odd'; } ?>">
        <td><?php echo $user['user_id']; ?></td>
        <td><?php echo $user['user_name']; ?></td>
        <td><?php echo $user['user_surname']; ?></td>
        <td><?php echo date("d/m/y", $user['user_registered']); ?></td>
        <td><?php echo $user['user_stars']; ?></td>
        <td>
            <?php echo anchor("admin/user/view_user/edit_user/".$user['user_id'], '<img src="'. base_url() .'/theme/images/edit.png" alt="'.$this->lang->line('main_edit').'">', $this->lang->line('main_edit')); ?>
        </td>
        <td>
			<?php
                echo anchor(
                    "admin/user/delete_user/" . $user['user_id'],
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
