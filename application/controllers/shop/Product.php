<?php
class Product extends CI_Controller {
	var $lang;
	function __construct()
	{
		parent::__construct();
	}

	function index($lang=NULL, $productNicename=NULL)
	{
		if($lang!="greek") redirect('shop/index/greek');

		$this->config->set_item('language', $lang);


		$data['pagename'] = 'main_slogan';
		$data['lang'] = $lang;

		$content_data = array();
		if(empty($productNicename)) {
			$data['contents'] = "Nothing to display";
		}
		else {
			$content_data['nicename'] = $productNicename;
			$content_data['product'] = $this->Product_model->get_product_by_nicename($content_data['nicename']);
			$content_data['product'] = $content_data['product'] + $this->Product_model->get_product_text($content_data['product']['productID']);
			//$content_data['product'] = $content_data['product'] + $this->Category_model->get_category_text($content_data['product']['categoryID']);
			$content_data['images_arr'] = $this->Product_model->get_product_image($content_data['product']['productID']);
			$content_data['meta'] = $this->Product_model->get_product_meta($content_data['product']['productID']);
			$content_data['product']['category_text'] = $this->Category_model->get_category_names($this->Product_model->get_product_categories($content_data['product']['productID']));
			$content_data['product'] += $this->Product_model->get_product_main_image($content_data['product']['productID']);

			$content_data['lang'] = $lang;

			$data['contents'] = $this->load->view('shop/contents/product_tpl', $content_data, TRUE);
			//$data['categoryID'] = $content_data['product']['categoryID'];
			$data['title'] = $content_data['product']['title_'.$lang];

			//$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', array("categoryID" => $content_data['product']['categoryID']), TRUE);
			$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', array('categories_arr' => ($this->Category_model->get_all_category_ids_recursive()), "parent" => array(), "childs" => array(), "current" => 0), TRUE);
			//$data['rblock'] = $this->load->view('shop/blocks/product_type_num_tpl', $rblock_data, TRUE);
			$data['scripts'] = '<script type="text/javascript" src="'. base_url() .'theme/overlib.js"><!-- overLIB (c) Erik Bosrup --></script>';
		}

		$this->load->view('shop/container', $data);
	}
}
