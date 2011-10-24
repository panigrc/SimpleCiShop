<?php
class Product extends Controller {
	var $lang;
	function Product()
	{
		parent::Controller();	
		$this->load->helper('url');	
		$this->load->helper('form');
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->load->model('Search_model');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}
	
	function index($lang=null, $productNicename=null)
	{
		if($lang!="greek") redirect('catalog/index/greek');
		
		$this->config->set_item('language', $lang);
		$this->lang->load('main');
		
		$data['pagename'] = 'main_slogan';
		$data['lang'] = $lang;
		
		$content_data = array();
		if(empty($productNicename)) {
			$data['contents'] = "Nothing to display";
		}
		else {
			$content_data['nicename'] = $productNicename;
			$content_data['product'] = $this->Product_model->getProductByNicename($content_data['nicename']);
			$content_data['product'] = $content_data['product'] + $this->Product_model->getProductText($content_data['product']['productID']);
			//$content_data['product'] = $content_data['product'] + $this->Category_model->getCategoryText($content_data['product']['categoryID']);
			$content_data['images_arr'] = $this->Product_model->getProductImage($content_data['product']['productID']);
			$content_data['meta'] = $this->Product_model->getProductMeta($content_data['product']['productID']);
			$content_data['product']['category_text'] = $this->Category_model->getCategoryNames($this->Product_model->getProductCategories($content_data['product']['productID']));
			$content_data['product'] += $this->Product_model->getProductMainImage($content_data['product']['productID']);
			
			$content_data['lang'] = $lang;
			
			$data['contents'] = $this->load->view('contents/product_tpl', $content_data, true);
			//$data['categoryID'] = $content_data['product']['categoryID'];
			$data['title'] = $content_data['product']['title_'.$lang];
			
			//$data['rblock'] = $this->load->view('blocks/category_block_tpl', array("categoryID" => $content_data['product']['categoryID']), true);
			$data['rblock'] = $this->load->view('blocks/category_block_tpl', array('categories_arr' => ($this->Category_model->getAllCategoryIDs_rec()), "parent" => array(), "childs" => array(), "current" => 0), true);
			//$data['rblock'] = $this->load->view('blocks/product_type_num_tpl', $rblock_data, true);
			$data['scripts'] = '<script type="text/javascript" src="'. base_url() .'theme/overlib.js"><!-- overLIB (c) Erik Bosrup --></script>';
		}
			
		$this->load->view('container', $data);
	}
}
?>
