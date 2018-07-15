<?php
class Cart extends CI_Controller {
	var $lang;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Product_model');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}

	function index()
	{

		// fortonei ta periexomena olou tou cart (den xreiazetai tora)


	}

	function cart_add($lang)
	{
		$product_id=substr($this->input->post('id'),strpos($this->input->post('id'),'_')+1);
		$this->cart_library->cart_add($product_id);
		$this->cart_update($lang);
	}

	function cart_remove($lang)
	{
		$product_id=substr($this->input->post('id'),strpos($this->input->post('id'),'_')+1);
		$this->cart_library->cart_remove($product_id);
		$this->cart_update($lang);
	}

	function cart_update($lang)
	{

		$this->config->set_item('language', $lang);
		$this->lang->load('main');

		// fortonei ta periexomena tou cart
		$cart = $this->cart_library->get_cart();
		$products = array();
		foreach($cart as $product => $value) {
			$products[$product] = $this->Product_model->get_product($product);
			$products[$product] += $this->Product_model->get_product_text($product);
			$products[$product] += $this->Product_model->get_product_main_image($product);
			$products[$product]['quantity'] = $value;
		}


		$this->load->view('cart/cart_items_tpl', array('cart' => $products, 'lang' => $lang));


	}
}
