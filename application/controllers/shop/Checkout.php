<?php

use Emporio\Ui\Factory\BlockFactory;

final class Checkout extends CI_Controller {

	public function index()
	{
		$cart = $this->cart_library->get_cart();

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

	/**
	 * @deprecated It seems that this Action is never used
	 */
	public function get_user()
	{
		$user = $this->user_model->search_user($this->input->post('user_code'), $this->input->post('user_phone_or_email'));

		/** @todo	create a template for this */
		echo "<script type='text/javascript'>";
		if ($user)
		{
			extract($user);

			echo "\$('user_name').value='".$user_name."';";
			echo "\$('user_surname').value='".$user_surname."';";
			echo "\$('user_email').value='".$user_email."';";
			echo "\$('user_url').value='".$user_url."';";
			echo "\$('user_birthdate').value='".date("d/m/Y", $user_birthdate)."';";
			echo "\$('user_address').value='".$user_address."';";
			echo "\$('user_city').value='".$user_city."';";
			echo "\$('user_zip').value='".$user_zip."';";
			echo "\$('user_country').value='".$user_country."';";
			echo "\$('user_phone').value='".$user_phone."';";
			echo "\$('user_id').value='".$user_id."';";
			echo "\$('user_stars').value='".$user_stars."';";
			echo "\$('stars').innerHTML='".$user_stars."';";
			echo "\$('language').value='".$lang."';";
		}
		else
		{
			//echo "Form.reset('checkout_form')";
			//echo "alert('dffdfd+".$this->input->post('user_email')."');";
		}

		echo "</script>";
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

		$products = $this->cart_library->get_cart();

		if ($this->input->post('user_id'))
		{
			$this->user_model->set_user($this->input->post('user_id'));
			$order_id = $this->order_model->add_order($this->input->post('user_id'));
		}
		else
		{
			$user_id = $this->user_model->add_user();
			$order_id = $this->order_model->add_order($user_id);
		}
		$this->order_model->add_order_products($order_id, $products);

		if ('1' === $this->input->post('shipment_cash_on_delivery')
			|| '3' === $this->input->post('shipment_cash_on_delivery'))
		{
			redirect('checkout/thankyou');
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
				'pagename' => 'main_checkout',
				'title' => '',
				'order_id' => $order_id,
				'price' => $this->input->post('price'),
				'user_email' => $this->input->post('user_email'),
				'user_name' => $this->input->post('user_name'),
				'user_surname' => $this->input->post('user_surname'),
				'user_address' => $this->input->post('user_address'),
				'user_city' => $this->input->post('user_city'),
				'user_zip' => $this->input->post('user_zip'),
			]
		);

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

	private function _get_price_sum($cart)
	{
		$products = [];
		$sum=0;
		foreach ($cart as $product => $value)
		{
			$products[$product] = $this->product_model->get_product($product)
								+ $this->product_model->get_product_text($product);
			$products[$product]['quantity'] = $value;

			for ($i=0;$i<$products[$product]['quantity'];$i++)
			{
				$sum += $products[$product]['price_'.$this->language_library->get_language()];
			}
		}

		return $sum;
	}
}
