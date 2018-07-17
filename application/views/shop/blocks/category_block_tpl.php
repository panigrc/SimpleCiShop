<?php
    //global $lang, $method, $controller, $product_type, $price_from, $price_to, $order_by;
    
    function printChilds($arr, $level=0, $vars=array()) {
        
        $obj = &get_instance();
        extract($vars);
        
        $this_level = "";
        $next_level = "";
        
        if(count($arr) >0 && $level > 0) {
        
            $this_level .= "                    <ul>\n";
        }
        
        foreach($arr as $item => $key){
            $this_level .= "                    <li><a href=\"".site_url('shop/index/'. $lang .'/'. $obj->Category_model->get_category_nicename($item));
            $this_level .= "\" >". $obj->Category_model->get_category_name($item) . "</a>\n";
            //$this_level .= printChilds($key, $level+1, $vars);
        }
        
        if(count($arr) >0 && $level > 0) {
            $this_level .= "                    </li>\n";
            $this_level .= "                    </ul>\n";
        }
        
        return $this_level;
    }
    
    
    function printOptions($arr, $categoryID, $level=0, $vars=array()) {
        //global $method, $controller, $lang, $product_type, $price_from, $price_to, $order_by;
        $obj = &get_instance();
        extract($vars);
        
        $this_level = "";
        $next_level = "";
        
        if(count($arr) >0 && $level > 0) {
        
            $this_level .= "                    <ul id='ul$level$categoryID'>\n";
        }
        
        foreach($arr as $item => $key){
            if(count($parent) > 0 && $parent[0] === $item) {
                foreach($parent as $cur_parent) {
                    $this_level .= "                    <ul>\n";
                    $this_level .= "                    <li><a href=\"".site_url('shop/index/'. $lang .'/'. $obj->Category_model->get_category_nicename($cur_parent));
                    $this_level .= " \">".$obj->Category_model->get_category_name($cur_parent) . "</a>\n";
                    $this_level .= "                    </li>\n";
                    $this_level .= "                    </ul>\n";
                }
                $this_level .= "                    <li><a href=\"".site_url('shop/index/'. $lang .'/'. $obj->Category_model->get_category_nicename($current));
                $this_level .= " \">".$obj->Category_model->get_category_name($current) . "</a>\n";
                $this_level .= printChilds($childs, 0, $vars);
                $this_level .= "                    </li>\n";
            }
            elseif($current === $item) {
                $this_level .= "                    <li><a href=\"".site_url('shop/index/'. $lang .'/'. $obj->Category_model->get_category_nicename($current));
                $this_level .= " \">".$obj->Category_model->get_category_name($current) . "</a>\n";
                $this_level .= printChilds($childs, 0, $vars);
                $this_level .= "                    </li>\n";
            }
            else {
                $this_level .= "                    <li><a href=\"".site_url('shop/index/'. $lang .'/'. $obj->Category_model->get_category_nicename($item));
                $this_level .= "\" >".$obj->Category_model->get_category_name($item) . "</a>\n";
                //$this_level .= printOptions($key, $item, $level+1, $vars);
            }
            $this_level .= "                    </li>\n";
            
        }

        if(count($arr) >0 && $level > 0) {
            $this_level .= "                    </li>\n";
            $this_level .= "                    </ul>\n";
        }
        return $this_level;
    } // printOptions
    
?>
				<div class="box_top">
					<h2><?php echo $this->lang->line('main_categories'); ?></h2>
				</div>
                <div class="box">
                    <div class="menu">
                        <ul>
                            <li><a href="<?php echo site_url('shop/index/'.$lang.'/'); ?>"><?php echo $this->lang->line('main_all'); ?></a></li>
                    
<?php
    echo printOptions($categories_arr, 0, 0, compact("lang", "current", "parent", "childs"));
?>
                        </ul>
                    </div>
                </div>
				<div class="box_bottom"></div>
