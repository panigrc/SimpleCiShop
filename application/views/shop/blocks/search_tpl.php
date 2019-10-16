<?php
    if(isset($country_id)) {
        $categories_arr = ($this->search_model->getCategoriesWithRealties_rec($country_id));
    }
    else {
        $categories_arr = ($this->search_model->getCategoriesWithRealties_rec());
    }
    //print_r($categories_arr);

    extract($this->search_model->getSearchData());

    $order_by_arr = array('priceasc', 'pricedesc', 'dateasc', 'datedesc');

    function printOptions($arr, $category_id, $level=0) {
        $obj =& get_instance();
        foreach($arr as $item => $key){
?>
    <option value="<?= $item; ?>" <?= $item === $category_id ? "selected" : ""; ?> style="font-weight: <?= $level === 0 ? "bold" : "normal"; ?>;"><?= str_repeat("-", $level) ." ". $obj->category_model->get_category_name($item) ?></option>
<?php
            printOptions($key, $category_id, $level+1);
        }
    }
?>
            <div class="sf_left">
				<img src="<?= base_url() ?>/theme/images/house.jpg" style="float:right; margin: 0 9px 3px 0;" />
<?= form_open('shop/catalog/'.$this->uri->segment(2).'/0') ?>
					<p class="search">
                        <label class="search" for="category_id"><?= $this->lang->line('main_category') ?>:</label>
                        <select name="category_id" id="category_id" class="search">
                            <option value="0"<?= empty($category_id) === TRUE ? ' selected="selected"' : ""; ?>><?= $this->lang->line('all') ?></option>
<?php
printOptions($categories_arr, @$category_id);
?>
                        </select>
                        <a href="<?= site_url('/shop/category/index/'.@$country_id) ?>"><?= $this->lang->line('main_map') ?></a>
                    </p>
					<p class="search"><label class="search" for="product_type">
                        <?= $this->lang->line('main_product_type') ?>:</label>
                        <select name="product_type" id="product_type" class="search">
<?php for($i = 0; $this->product_model->getProductTypeText($i) != -1; $i++): ?>
                        <option value="<?= $i; ?>"<?= $i === $product_type ? ' selected="selected"' : ""; ?>><?= $this->lang->line($this->search_model->getProductTypeText($i)) ?></option>
<?php endfor; ?>
                        </select>
                    </p>
					<p class="search">
                        <label class="search" for="price_from"><?= $this->lang->line('main_price').' '.$this->lang->line('main_from') ?>:</label>
                        <input type="text" name="price_from" id="price_from" class="price" value="<?= $price_from ?>" />
                        <label for="price_to"><?= $this->lang->line('main_to') ?>:</label>
                        <input type="text" name="price_to" id="price_to" class="price" value="<?= $price_to ?>" />
                    </p>
                    <p class="search">
                        <label class="search" for="order_by"><?= $this->lang->line('main_order_by') ?>:</label>
                        <select name="order_by" id="order_by" class="search">
<?php foreach($order_by_arr as $val): ?>
                            <option value="<?= $val ?>"<?= $val === $order_by ? ' selected="selected"' : ""; ?>><?= $this->lang->line('main_'.$val) ?></option>
<?php endforeach; ?>
                        </select>
                        <input type="submit" value="<?= $this->lang->line('main_search') ?>" class="submit" />
                    </p>
                    <p>
                         <label class="search" for="code"><?= $this->lang->line('main_code') ?>:</label>
                         <input type="text" name="code" id="code" class="price" value="" />
                         <input type="button" value="<?= $this->lang->line('main_search'); ?>" class="submit" onclick="window.location='<?= site_url('/shop/product') ?>/' + document.getElementById('code').value; "/>
                    </p>
<?= form_close() ?>
				<div style="clear: both"></div>
			</div>
