<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_library {

	/**
	 * @var	CI_Controller	$CI
	 */
	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	public function cart_add($product_id)
	{
		$cart = $this->CI->session->userdata('cart');
		$cart[$product_id] = (isset($cart[$product_id]))? $cart[$product_id]+1:1;
		$this->CI->session->set_userdata(array('cart' => $cart));
	}

	public function cart_remove($product_id)
	{
		$cart = $this->CI->session->userdata('cart');
		$cart[$product_id] = ($cart[$product_id]-1)?$cart[$product_id]-1:0;
			if ($cart[$product_id] === 0) unset($cart[$product_id]);
		$this->CI->session->set_userdata(array('cart' => $cart));
	}

	public function get_cart()
	{
		$cart = $this->CI->session->userdata('cart');
		if (empty($cart))
		{
			return array();
		}
		if (isset($cart['affiliate']))
		{
			unset($cart['affiliate']);
		}

		return $cart;
	}

	public function cart_block()
	{
		/** @var array $cart contents */
		$cart = $this->get_cart();
		$products = array();
		foreach ($cart as $product => $value)
		{
			$products[$product] = $this->CI->product_model->get_product($product)
				+ $this->CI->product_model->get_product_text($product)
				+ $this->CI->product_model->get_product_main_image($product)
			;
			$products[$product]['quantity'] = $value;
		}

		return $this->CI->load->view(
			'shop/cart/cart_items_tpl',
			array('cart' => $products, 'lang' => $this->CI->language_library->get_language()),
			true
		);
	}
}
