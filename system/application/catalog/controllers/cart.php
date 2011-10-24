<?php

class Cart extends Controller {
	var $lang;
	function Cart()
	{
		parent::Controller();	
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
		$cart = $this->cart_library->getCart();
		$products = array();
		foreach($cart as $product => $value) {
			$products[$product] = $this->Product_model->getProduct($product);
			$products[$product] += $this->Product_model->getProductText($product);
			$products[$product] += $this->Product_model->getProductMainImage($product);
			$products[$product]['quantity'] = $value;
		}
		
		
		$this->load->view('cart/cart_items_tpl', array('cart' => $products, 'lang' => $lang));
	
	
	}
}
?>
