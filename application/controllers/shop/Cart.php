<?php
class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param	$product_id
	 */
	public function cart_add($product_id)
	{
		$this->cart_library->cart_add($product_id);
		redirect($this->agent->is_referral() ? $this->agent->referrer() : 'shop/catalog');
	}

	/**
	 * @param	$product_id
	 */
	public function cart_remove($product_id)
	{
		$this->cart_library->cart_remove($product_id);
		redirect($this->agent->is_referral() ? $this->agent->referrer() : 'shop/catalog');
	}
}
