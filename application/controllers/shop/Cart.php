<?php
class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function cart_add()
	{
		$product_id=substr($this->input->post('id'),strpos($this->input->post('id'),'_')+1);
		$this->cart_library->cart_add($product_id);
		$this->cart_update();
	}

	public function cart_remove()
	{
		$product_id=substr($this->input->post('id'),strpos($this->input->post('id'),'_')+1);
		$this->cart_library->cart_remove($product_id);
		$this->cart_update();
	}

	public function cart_update()
	{
		/** @var array $cart contents */
		$cart = $this->cart_library->get_cart();
		$products = array();
		foreach ($cart as $product => $value)
		{
			$products[$product] = $this->product_model->get_product($product)
								+ $this->product_model->get_product_text($product)
								+ $this->product_model->get_product_main_image($product)
			;
			$products[$product]['quantity'] = $value;
		}

		$this->load->view('shop/cart/cart_items_tpl', array('cart' => $products, 'lang' => $this->language_library->get_language()));
	}
}
