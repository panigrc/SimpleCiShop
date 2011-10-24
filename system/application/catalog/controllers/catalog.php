<?php

class Catalog extends Controller {
    	var $lang;
	function Catalog()
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
	
	function index($lang=null)
	{
		if($lang!="greek") redirect('catalog/index/greek');
	
		$this->config->set_item('language', $lang);
		$this->lang->load('main');
		
		$affiliate = $this->uri->segment(6,"");        
		if($affiliate) $this->_setAffiliate($affiliate);
		
		//$searchData = $this->Search_model->getSearchData();
		
		$nicename = $this->uri->segment(4,"");
		$categoryID = 0;
		if($nicename != "") $categoryID = $this->Category_model->getCategoryID($nicename);
		
		$content_data = array();
	
		$content_data['lang'] = $lang;
		$content_data['products'] = $this->_getProductData($categoryID);
		$content_data['pagination'] = $this->_pagination($categoryID);
		$content_data['category_text'] = $this->Category_model->getCategoryText($categoryID);
		
		$data['contents'] = '';
		
		if($categoryID == 0) $data['contents'] = $this->load->view('contents/'.$lang.'/home_tpl', $content_data, true);
		
		$data['contents'] .= $this->load->view('contents/catalog_tpl', $content_data, true);
		
		$data['rblock'] = $this->load->view('blocks/category_block_tpl', array('categories_arr' => ($this->Category_model->getAllCategoryIDs_rec()), 'parent' => ($this->Category_model->getCategoryParents($categoryID)), 'childs' => ($this->Category_model->getCategoryChilds($categoryID)) , 'current' => $categoryID), true);
		//$data['rblock'] = $this->load->view('blocks/product_type_num_tpl', array('countryID' => null), true);
		//$data['tblock'] = $this->load->view('blocks/search_tpl', array('countryID' => null), true);
		
		$data['pagename'] = 'main_catalog';
		$data['lang'] = $lang;
		//$data['categoryID'] = $this->Search_model->getSearchData();
		//$data['categoryID'] = $searchData['categoryID'];
		$data['categoryID'] = $categoryID;
		$data['title'] = $this->Category_model->getCategoryName($categoryID);
		
		$this->load->view('container', $data);
	}

	function _getProductData($categoryID, $products_per_page=6)
	{
		//extract($this->Search_model->getSearchData());
		
		//$current_page = empty($this->uri->segment(5)) == false ? $this->uri->segment(5) : 0;
		$current_page = $this->uri->segment(5);
		$current_page = empty($current_page) == false ? $current_page : 0;
		
		$products = $this->Search_model->searchProductsByCategoryID($categoryID, $products_per_page, $current_page);
	
		foreach($products as $product => $value) {
			$products[$product] += $this->Product_model->getProductText($products[$product]['productID']);
			$products[$product] += $this->Category_model->getCategoryText($products[$product]['categoryID']);
			$products[$product] += $this->Product_model->getProductMainImage($products[$product]['productID']);
		}
	
		//print_r($products);
	
		return $products;
	}
	
	function _pagination($categoryID, $method='index', $products_per_page=6)
	{
		$lang = $this->config->item('language');
		//extract($this->Search_model->getSearchData());
		
		$this->load->library('pagination');
		
		$config['base_url'] = site_url('catalog/'.$method.'/'.$lang.'/'.$this->Category_model->getCategoryNicename($categoryID).'/');
		$config['total_rows'] = count($this->Search_model->searchProductsByCategoryID($categoryID));
		$config['per_page'] = $products_per_page;
		$config['uri_segment'] = 5;
		$config['num_links'] = 50;
		$config['first_link'] = $this->lang->line('main_page_first');
		$config['last_link'] = $this->lang->line('main_page_last');
		
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
	
	function _setAffiliate($affiliate)
	{
		$cart = $this->session->userdata('cart');
		
		$cart['affiliate'] = (isset($affiliate))? $affiliate:"";
		$this->session->set_userdata(array('cart' => $cart));
	}
}
?>
