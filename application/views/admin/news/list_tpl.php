<p>
	<?php echo anchor('admin/news/view_news/add_news', sprintf('<img src="%s/theme/images/add2.png" align="middle"> %s', base_url(), $this->lang->line('main_create_news'))); ?>
</p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th><?php echo $this->lang->line('main_title'); ?></th>
        <th><?php echo $this->lang->line('main_published'); ?></th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
	<?php foreach ($news as $new): ?>
        <tr class="<?php if (@$style === 'odd') {
			echo 'even';
			$style = 'even';
		} else {
			echo 'odd';
			$style = 'odd';
		} ?>">
            <td><?php echo $new['title_greek']; ?></td>
            <td><?php echo date("d/m/y", $new['published']); ?></td>
            <td><?php echo anchor("admin/news/view_news/edit_news/" . $new['news_id'], '<img src="' . base_url() . '/theme/images/edit.png" alt="' . $this->lang->line('main_edit') . '">', $this->lang->line('main_edit')); ?></td>
            <td>
				<?php
                    echo anchor(
                        "admin/news/delete_news/" . $new['news_id'],
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
