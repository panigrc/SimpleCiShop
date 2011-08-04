<p><?php echo anchor("user/view_user/add_user", '<img src="'. base_url() .'/theme/images/add2.png" alt="Προσθήκη Χρήστη" align="middle"> Προσθήκη Χρήστη', 'Προσθήκη Χρήστη'); ?></p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th>id</th>
        <th>Όνομα</th>
        <th>Επώνυμο</th>
        <th>Εγγραφή</th>
        <th>Αστέρια</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
<?php foreach($users as $user): ?>
    <tr class="<?php if(@$style=='odd'){ echo 'even'; $style='even';} else{ echo 'odd'; $style='odd'; } ?>">
        <td><?php echo $user['userID']; ?></td>
        <td><?php echo $user['user_name']; ?></td>
        <td><?php echo $user['user_surname']; ?></td>
        <td><?php echo date("d/m/y", $user['user_registered']); ?></td>
        <td><?php echo $user['user_stars']; ?></td>
        <td><?php echo anchor("user/view_user/edit_user/".$user['userID'], '<img src="'. base_url() .'/theme/images/edit.png" alt="'.$this->lang->line('main_edit').'">', $this->lang->line('main_edit')); ?></td>
        <td><?php echo anchor("user/delete_user/".$user['userID'], '<img src="'. base_url() .'/theme/images/delete2.png" alt="'.$this->lang->line('main_delete').'">', array('title' => $this->lang->line('main_delete'), 'onclick' => 'if(!confirm(\'Θελετε σίγουρα να διαγραφεί η εγγραφή;\')) return false;')); ?></td>
    </tr>
<?php endforeach; ?>
</table>
