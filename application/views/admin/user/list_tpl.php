<p>
	<?= anchor('admin/user/view_user/add_user', sprintf('<i class="fas fa-plus-circle"></i> %s', $this->lang->line('main_create_user'))) ?>
</p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th><?= $this->lang->line('main_user_id') ?></th>
        <th><?= $this->lang->line('main_user_first_name') ?></th>
        <th><?= $this->lang->line('main_user_last_name') ?></th>
        <th><?= $this->lang->line('main_user_registered_at') ?></th>
        <th><?= $this->lang->line('main_user_points') ?></th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
<?php foreach($users as $user): ?>
    <tr class="<?php if(@$style === 'odd'){ echo 'even'; $style='even';} else{ echo 'odd'; $style='odd'; } ?>">
        <td><?= $user['user_id'] ?></td>
        <td><?= $user['first_name'] ?></td>
        <td><?= $user['last_name'] ?></td>
        <td><?= $user['registered'] ?></td>
        <td><?= $user['credits'] ?></td>
        <td>
            <?= anchor("admin/user/view_user/edit_user/".$user['user_id'], '<i class="fas fa-edit"></i>') ?>
        </td>
        <td>
			<?php
                echo anchor(
                    "admin/user/delete_user/" . $user['user_id'],
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
