				<div class="right_side">
					<div class="categories">
                        <p><a href="<?= site_url('category/index/1') ?>"><?= $this->lang->line('main_map_greek'); ?></a> | <a href="<?= site_url('category/index/2') ?>"><?= $this->lang->line('main_map_german') ?></a></p>
<?php
foreach($categories_arr as $category => $sub_categories) {
    foreach($sub_categories as $sub_category => $val) {
        if($val === $category_id) $parent_category_id = $category;
    }
}
?>
                        <h2>
<?php
    if(isset($parent_category_id)) {
        echo $this->category_model->get_category_name($parent_category_id)."&nbsp;>>&nbsp;";
        if($this->category_model->category_has_info($parent_category_id)>0) { ?>
                            <a href="<?= site_url('category/view_category/'.$parent_category_id) ?>"><i class="fas fa-info-circle"></i></a>
<?php
        }
    }
    echo $this->category_model->get_category_name($category_id);
?>
                        </h2>
					</div>
                    <div class="item">
<?php $category_text = $this->category_model->get_category_text($category_id); ?>
                    <?= $category_text['category_description_'.$lang] ?>
                    </div>
                    <div style="clear:both;"></div>
				</div>
