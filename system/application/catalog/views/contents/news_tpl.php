				<div class="right_side">
<?php foreach($news as $new): ?>
					<div class="article">
						<h2><?php echo $new['title_'.$lang]; ?></h2>
                        <h3><?php echo $this->lang->line('main_published'); ?>: <?php echo date("d/m/y", $new['published']); ?></h3>
                        <?php echo $new['description_'.$lang]; ?>
					</div>
                    <div style="clear:both;"></div>
<?php endforeach; ?>
                    <div style="text-align: center;"><?php if(!empty($pagination)) echo $this->lang->line('main_page') .': '. @$pagination; ?></div>
				</div>
