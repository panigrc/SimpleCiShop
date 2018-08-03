<?php
    extract($this->search_model->getSearchData());
    if(empty($category_id)) $category_id = $country_id;
    $product_type_num = $this->search_model->getOfferTypeNumOfRealties($category_id);
    if( ! isset($method)) $method = $this->uri->segment(2);
    if( ! isset($controller)) $controller = $this->uri->segment(1);
?>
				<div class="box_top">
					<h2><?php echo $this->lang->line('main_product_type'); ?>:</h2>
				</div>
                <div class="box">
<?php 
    for($i = 0; $this->product_model->getProductTypeText($i) != -1; $i++):
        $searchString = implode('_', array($category_id, $i, $price_from, $price_to, $order_by));
?>
                    <p><a href="<?php echo site_url($controller.'/'. $method.'/'.$searchString); ?>"><?php echo $this->lang->line($this->search_model->getProductTypeText($i)); ?></a>&nbsp;&nbsp;<?php echo '['. $product_type_num[$i] .']'; ?></p>
<?php endfor; ?>
				</div>
				<div class="box_bottom"></div>
