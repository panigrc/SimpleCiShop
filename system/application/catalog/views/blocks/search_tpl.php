<?php
    if(isset($countryID)) {
        $categories_arr = ($this->Search_model->getCategoriesWithRealties_rec($countryID));
    }
    else {
        $categories_arr = ($this->Search_model->getCategoriesWithRealties_rec());
    }
    //print_r($categories_arr);
    
    extract($this->Search_model->getSearchData());
    
    $order_by_arr = array('priceasc', 'pricedesc', 'dateasc', 'datedesc');
    
    function printOptions($arr, $categoryID, $level=0) {
        $obj =& get_instance();
        foreach($arr as $item => $key){
?>
    <option value="<?php echo $item;?>" <?php echo $item == $categoryID ? "selected" : ""; ?> style="font-weight: <?php echo $level==0 ? "bold" : "normal"; ?>;"><?php echo str_repeat("-", $level) ." ". $obj->Category_model->getCategoryName($item); ?></option>
<?php
            printOptions($key, $categoryID, $level+1);
        }
    }
?>
            <div class="sf_left">
				<img src="<?php echo base_url(); ?>/theme/images/house.jpg" style="float:right; margin: 0 9px 3px 0;" alt="house - tselis.com" />			
<?php echo form_open('catalog/'.$this->uri->segment(2).'/'.$lang.'/0'); ?>
					<p class="search">
                        <label class="search" for="categoryID"><?php echo $this->lang->line('main_category'); ?>:</label>
                        <select name="categoryID" id="categoryID" class="search">
                            <option value="0"<?php echo empty($categoryID) == true ? ' selected="selected"' : ""; ?>><?php echo $this->lang->line('all'); ?></option>
<?php
printOptions($categories_arr, @$categoryID);
?>
                        </select>
                        <a href="<?php echo site_url('category/index/'.$lang.'/'.@$countryID) ?>"><?php echo $this->lang->line('main_map'); ?></a>
                    </p>
					<p class="search"><label class="search" for="product_type">
                        <?php echo $this->lang->line('main_product_type'); ?>:</label>
                        <select name="product_type" id="product_type" class="search">
<?php for($i = 0; $this->Product_model->getProductTypeText($i) != -1; $i++): ?>
                        <option value="<?php echo $i;?>"<?php echo $i == $product_type ? ' selected="selected"' : ""; ?>><?php echo $this->lang->line($this->Search_model->getProductTypeText($i)); ?></option>
<?php endfor; ?>
                        </select>
                    </p>
					<p class="search">
                        <label class="search" for="price_from"><?php echo $this->lang->line('main_price').' '.$this->lang->line('main_from'); ?>:</label> 
                        <input type="text" name="price_from" id="price_from" class="price" value="<?php echo $price_from; ?>" />
                        <label for="price_to"><?php echo $this->lang->line('main_to'); ?>:</label> 
                        <input type="text" name="price_to" id="price_to" class="price" value="<?php echo $price_to; ?>" />
                    </p>
                    <p class="search">
                        <label class="search" for="order_by"><?php echo $this->lang->line('main_order_by'); ?>:</label>
                        <select name="order_by" id="order_by" class="search">
<?php foreach($order_by_arr as $val): ?>
                            <option value="<?php echo $val ?>"<?php echo $val === $order_by ? ' selected="selected"' : ""; ?>><?php echo $this->lang->line('main_'.$val); ?></option>
<?php endforeach; ?>
                        </select>
                        <input type="submit" value="<?php echo $this->lang->line('main_search'); ?>" class="submit" />
                    </p>
                    <p>
                         <label class="search" for="code"><?php echo $this->lang->line('main_code'); ?>:</label>
                         <input type="text" name="code" id="code" class="price" value="" />
                         <input type="button" value="<?php echo $this->lang->line('main_search'); ?>" class="submit" onclick="window.location='<?php echo site_url('/product/index/'.$lang); ?>/' + document.getElementById('code').value; "/>
                    </p>
<?php echo form_close(); ?>
				<div style="clear: both"></div>
			</div>
