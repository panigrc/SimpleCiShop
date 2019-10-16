<?php
    $recent_news = $this->news_model->get_recent_news();
    $recent_news_text = $this->news_model->get_news_text(@$recent_news['news_id']);
?>
				<div class="box_top">
					<h2><?= $this->lang->line('main_news') ?></h2>
				</div>
					<div class="box">
                        <p class="highlight"><?= @$recent_news_text['title_'.$lang] ?></p>
						<p>
                            <?= mb_substr(strip_tags(@$recent_news_text['description_'.$lang]), 0, 250, 'UTF-8').'...' ?><br />
                        </p>
                        <p style="text-align:right;"><a href="<?= site_url('/shop/news'); ?>" title="<?= $this->lang->line('main_news'); ?>"><?= $this->lang->line('main_news') ?></a></p>
					</div>
				<div class="box_bottom"></div>
