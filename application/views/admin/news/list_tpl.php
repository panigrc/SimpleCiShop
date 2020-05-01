<p>
	<?= anchor('admin/news/view_news/add_news', sprintf('<i class="fas fa-plus-circle"></i> %s', $this->lang->line('main_create_news'))) ?>
</p>
<table>
	<tr>
		<th><?= $this->lang->line('main_title') ?></th>
		<th><?= $this->lang->line('main_published') ?></th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
	<?php foreach ($news ?? [] as $item): ?>
		<tr class="<?php if ($style ?? null === 'odd') {
			echo 'even';
			$style = 'even';
		} else {
			echo 'odd';
			$style = 'odd';
		} ?>">
			<td><?= $item['title_greek'] ?></td>
			<td><?= date('d/m/y', $item['published']) ?></td>
			<td><?= anchor('admin/news/view_news/edit_news/' . $item['news_id'], '<i class="fas fa-edit"></i>') ?></td>
			<td>
				<?php
					echo anchor(
						'admin/news/delete_news/' . $item['news_id'],
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
