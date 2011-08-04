<p><?php echo anchor("news/view_news/add_news", '<img src="'. base_url() .'/theme/images/add2.png" alt="Προσθήκη Νέου" align="middle"> Προσθήκη Νέου', 'Προσθήκη Νέου'); ?></p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th><?php echo $this->lang->line('main_title'); ?></th>
        <th><?php echo $this->lang->line('main_published'); ?></th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
<?php foreach($news as $new): ?>
    <tr class="<?php if(@$style=='odd'){ echo 'even'; $style='even';} else{ echo 'odd'; $style='odd'; } ?>">
        <td><?php echo $new['title_greek']; ?></td>
        <td><?php echo date("d/m/y", $new['published']); ?></td>
        <td><?php echo anchor("news/view_news/edit_news/".$new['newsID'], '<img src="'. base_url() .'/theme/images/edit.png" alt="'.$this->lang->line('main_edit').'">', $this->lang->line('main_edit')); ?></td>
        <td><?php echo anchor("news/delete_news/".$new['newsID'], '<img src="'. base_url() .'/theme/images/delete2.png" alt="'.$this->lang->line('main_delete').'">', array('title' => $this->lang->line('main_delete'), 'onclick' => 'if(!confirm(\'Θελετε σίγουρα να διαγραφεί η εγγραφή;\')) return false;')); ?></td>
    </tr>
<?php endforeach; ?>
</table>
