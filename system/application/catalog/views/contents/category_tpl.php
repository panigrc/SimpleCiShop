				<div class="right_side">
					<div class="categories">
                        <p><a href="<?php echo site_url('category/index/'.$lang.'/1') ?>"><?php echo $this->lang->line('main_map_greek'); ?></a> | <a href="<?php echo site_url('category/index/'.$lang.'/2') ?>"><?php echo $this->lang->line('main_map_german'); ?></a></p>
<?php 
foreach($categories_arr as $category => $sub_categories) {
    foreach($sub_categories as $sub_category => $val) {
        if($val == $categoryID) $parent_categoryID = $category;
    }
}
?>
                        <h2>
<?php 
    if(isset($parent_categoryID)) {
        echo $this->Category_model->getCategoryName($parent_categoryID)."&nbsp;>>&nbsp;";
        if($this->Category_model->categoryHasInfo($parent_categoryID)>0) { ?>
                            <a href="<?php echo site_url('category/view_category/'.$lang.'/'.$parent_categoryID) ?>"><img src="<?php echo base_url(); ?>/theme/images/about.png" alt="<?php echo $this->lang->line('main_information'); ?>" title="<?php echo $this->lang->line('main_information'); ?>" /></a>
<?php
        }
    }
    echo $this->Category_model->getCategoryName($categoryID);
?>
                        </h2>
					</div>
                    <div class="item">
<?php $category_text = $this->Category_model->getCategoryText($categoryID); ?>
                    <?php echo $category_text['category_description_'.$lang]; ?>
                    </div>
                    <div style="clear:both;"></div>
				</div>
