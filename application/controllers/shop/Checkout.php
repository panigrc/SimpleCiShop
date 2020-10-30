<?php

use Emporio\Ui\Factory\BlockFactory;

final class Checkout extends CI_Controller {

	public function index()
	{
		$cart = $this->cart_library->get_cart();

		if (empty($cart['products'] ?? [])) {
			$mainBlock = BlockFactory::create('contents', 5, function (CI_Controller $CI, array $vars) {
				return $CI->load->view('shop/contents/checkout/cart_empty', $vars, TRUE);
			});

			$this->template_library->addBlock($mainBlock);

			$this->template_library->view(
				'shop/container_tpl',
				[
					'pagename' => 'main_checkout',
					'title' => '',
				]
			);

			return;
		}

		$mainBlock = BlockFactory::create('contents', 5, function (CI_Controller $CI, array $vars) {
			return $CI->load->view('shop/contents/checkout/checkout_tpl', $vars, TRUE);
		});

		$this->template_library->addBlock($mainBlock);

		$scripts = BlockFactory::create('scripts', 2, function (CI_Controller $CI, array $vars) {
			return $CI->load->view('shop/blocks/checkout/checkout_scripts_tpl', $vars, TRUE);
		});

		$this->template_library->addBlock($scripts);

		$this->template_library->view(
			'shop/container_tpl',
			[
				'pagename' => 'main_checkout',
				'title' => '',
				'cart_costs' => $this->_get_price_sum($cart),
				'affiliate' => $this->_get_affiliate(),
			]
		);
	}

	private function _get_affiliate()
	{
		$cart = $this->session->userdata('cart');

		if (! isset($cart['affiliate'])) {
			return '';
		}
		return $cart['affiliate'];
	}

	public function order()
	{
		$order_id = NULL;

		if (FALSE === empty($user_id = $this->input->post('user_id')))
		{
			$this->user_model->set_user((int) $user_id, $this->_build_user_data());
		}
		else
		{
			$user_id = $this->user_model->add_user($this->_build_user_data());
		}

		$order_id = $this->order_model->add_order($this->_build_order_data($user_id));

		$this->order_model->add_order_products($order_id, $this->cart_library->get_cart()['products'] ?? []);

		$this->cart_library->reset_cart();

		if (Order_model::PAYMENT_TYPE_CASH_ON_DELIVERY === (int) $this->input->post('shipment_cash_on_delivery')
			|| Order_model::PAYMENT_TYPE_BANK_TRANSFER  === (int) $this->input->post('shipment_cash_on_delivery'))
		{
			redirect('shop/checkout/thankyou');
		}

		$contents = BlockFactory::create('contents', 4, function (CI_Controller $CI, array $vars) {
			return $CI->load->view('shop/contents/checkout/order_tpl', $vars, TRUE);
		});

		$this->template_library->addBlock($contents);

		$paypal_form = BlockFactory::create('contents', 5, function (CI_Controller $CI, array $vars) {
			return $CI->load->view('shop/blocks/checkout/paypal_form_tpl', $vars, TRUE);
		});

		$this->template_library->addBlock($paypal_form);

		$this->template_library->view(
			'shop/container_tpl',
			[
				'pagename'				=> 'main_checkout',
				'title'					=> '',
				'order_id'				=> $order_id,
				'price'					=> $this->input->post('price'),
				'email'   				=> $this->input->post('email'),
				'first_name'    		=> $this->input->post('first_name'),
				'last_name'				=> $this->input->post('last_name'),
				'street'				=> $this->input->post('street'),
				'city'					=> $this->input->post('city'),
				'zip'					=> $this->input->post('zip'),
				'paypal_business_email' => $this->config->item('payment_methods')['paypal']['email'],
			]
		);

	}

	/**
	 * @param int $user_id
	 * @return array
	 */
	private function _build_order_data(int $user_id): array
	{
		return [
			'user_id'					=> $user_id,
			'created'					=> $this->input->post('created'),
			'status'					=> $this->input->post('status'),
			'shipment_express'			=> $this->input->post('shipment_express'),
			'shipment_to_door'			=> $this->input->post('shipment_to_door'),
			'shipment_cash_on_delivery'	=> $this->input->post('shipment_cash_on_delivery'),
			'price'						=> $this->input->post('price'),
			'coupon_id'					=> $this->input->post('coupon_id'),
			'questionnaire'				=> $this->input->post('questionnaire'),
		];
	}

	private function _build_user_data(): array
	{
		return [
			'email'			=> $this->input->post('email'),
			'first_name'	=> $this->input->post('first_name'),
			'last_name'		=> $this->input->post('last_name'),
			'phone' 		=> $this->input->post('phone'),
			'street' 		=> $this->input->post('street'),
			'city' 			=> $this->input->post('city'),
			'zip' 			=> $this->input->post('zip'),
			'country' 		=> $this->input->post('country'),
			'birthdate'		=> $this->input->post('birthdate'),
			'url'			=> $this->input->post('url'),
			'language'		=> $this->language_library->get_language(),
		];
	}

	public function thankyou()
	{
		$cart = $this->cart_library->get_cart();

		$contents = BlockFactory::create('contents', 4, function (CI_Controller $CI, array $vars) {
			return $CI->load->view(
				sprintf("shop/contents/%s/thankyou_tpl", $CI->language_library->get_language()),
				$vars,
				TRUE
			);
		});

		$this->template_library->addBlock($contents);

		$this->template_library->view(
			'shop/container_tpl',
			[
				'pagename' => 'main_checkout',
				'title' => '',
			]
		);
	}

	/**
	 * @param	array	$cart
	 * @return	float
	 */
	private function _get_price_sum($cart)
	{
		$products = [];
		$sum=0;
		foreach ($cart['products'] as $product => $value)
		{
			$products[$product] = $this->product_model->get_product($product)
								+ $this->product_model->get_product_text($product);
			$products[$product]['quantity'] = $value;

			for ($i=0; $i<$products[$product]['quantity']; $i++)
			{
				$sum += $products[$product]['price_'.$this->language_library->get_language()];
			}
		}

		return $sum;
	}
}
