<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_library {
	function Cart_library ($params=null)
	{
		
	}
	
	function cart_add($productID)
	{
		$obj =& get_instance();
		$cart = $obj->session->userdata('cart');
		
		$cart[$productID] = (isset($cart[$productID]))? $cart[$productID]+1:1;
		$obj->session->set_userdata(array('cart' => $cart));
	}
	
	function cart_remove($productID)
	{
		$obj =& get_instance();
		$cart = $obj->session->userdata('cart');
		$cart[$productID] = ($cart[$productID]-1)?$cart[$productID]-1:0;
			if ($cart[$productID]==0) unset($cart[$productID]);
		$obj->session->set_userdata(array('cart' => $cart));
	}
	
	function getCart()
	{
		$obj =& get_instance();
		$cart = $obj->session->userdata('cart');
		if(empty($cart)) return array();
		if(isset($cart['affiliate'])) unset($cart['affiliate']);
		return $cart;
	}
}
?>
