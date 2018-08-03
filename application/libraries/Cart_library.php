<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart_library {

	public function __construct($params = NULL)
	{}

	public function cart_add($product_id)
	{
		$obj =& get_instance();
		$cart = $obj->session->userdata('cart');

		$cart[$product_id] = (isset($cart[$product_id]))? $cart[$product_id]+1:1;
		$obj->session->set_userdata(array('cart' => $cart));
	}

	public function cart_remove($product_id)
	{
		$obj =& get_instance();
		$cart = $obj->session->userdata('cart');
		$cart[$product_id] = ($cart[$product_id]-1)?$cart[$product_id]-1:0;
			if ($cart[$product_id] === 0) unset($cart[$product_id]);
		$obj->session->set_userdata(array('cart' => $cart));
	}

	public function get_cart()
	{
		$obj =& get_instance();
		$cart = $obj->session->userdata('cart');
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
}
