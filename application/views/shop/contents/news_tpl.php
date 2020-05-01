<div class="right_side">
	<?php foreach($news ?? [] as $article): ?>
	<div class="article">
		<h2><?= $article['title_'.$this->language_library->get_language()] ?></h2>
		<h3><?= $this->lang->line('main_published') ?>: <?= date('d/m/y', $article['published']) ?></h3>
		<?= $article['description_'.$this->language_library->get_language()] ?>
	</div>
	<div style="clear:both;"></div>
	<?php endforeach; ?>
	&nbsp;
	<div style="text-align: center;"><?= isset($pagination) && false === empty($pagination) ? $this->lang->line('main_page') .': '. $pagination : '' ?></div>
</div>
