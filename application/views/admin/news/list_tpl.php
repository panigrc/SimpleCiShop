<p>
	<?= anchor('admin/news/view_news/add_news', sprintf('<i class="fas fa-plus-circle"></i> %s', $this->lang->line('main_create_news'))) ?>
</p>
<table cellpadding=0 cellspacing=1>
    <tr>
        <th><?= $this->lang->line('main_title') ?></th>
        <th><?= $this->lang->line('main_published') ?></th>
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
            <td><?= $new['title_greek'] ?></td>
            <td><?= date("d/m/y", $new['published']) ?></td>
            <td><?= anchor("admin/news/view_news/edit_news/" . $new['news_id'], '<i class="fas fa-edit"></i>') ?></td>
            <td>
				<?php
                    echo anchor(
                        "admin/news/delete_news/" . $new['news_id'],
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
