<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cartBlock
{
	/**
	 * @param	CI_Controller	$CI
	 * @param	array	$vars
	 * @return	string
	 */
	public static function view($CI, array $vars)
	{
		/** @var array $cart contents */
		$cart = $CI->cart_library->get_cart();
		$products =[];
		foreach ($cart['products'] as $product => $value)
		{
			$products[$product] = $CI->product_model->get_product($product)
				+ $CI->product_model->get_product_text($product)
				+ $CI->product_model->get_product_main_image($product)
			;
			$products[$product]['quantity'] = $value;
		}

		return $CI->load->view(
			'shop/blocks/cart/cart_tpl',
			array_merge(['cart_items' => $products], $vars),
			TRUE
		);
	}
}
