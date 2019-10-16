				<div class="right_side">
<?php foreach($news as $article): ?>
					<div class="article">
						<h2><?php echo $article['title_'.$this->language_library->get_language()]; ?></h2>
                        <h3><?php echo $this->lang->line('main_published'); ?>: <?php echo date("d/m/y", $article['published']); ?></h3>
                        <?php echo $article['description_'.$this->language_library->get_language()]; ?>
					</div>
                    <div style="clear:both;"></div>
<?php endforeach; ?>
					&nbsp;
                    <div style="text-align: center;"><?php if( ! empty($pagination)) echo $this->lang->line('main_page') .': '. @$pagination; ?></div>
				</div>
