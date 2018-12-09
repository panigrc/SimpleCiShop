<?php

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$cart = $this->cart_library->get_cart();

		$content_data = array(
			'lang' => $this->language_library->get_language(),
			'cart_costs' => $this->_get_price_sum($cart, $this->language_library->get_language()),
			'affiliate' => $this->_get_affiliate(),
		);

		$rblock_data = array(
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			'parent' => array(),
			'children' => array(),
			'current' => 0
		);

		$data = array(
			'contents' => $this->load->view('shop/contents/checkout_tpl', $content_data, TRUE),
			'rblock' => $this->load->view('shop/blocks/category_block_tpl', $rblock_data, TRUE),
			'title' => '',
			'pagename' => 'main_checkout',
			'lang' => $this->language_library->get_language(),
		);

		/** @todo	create a template for this */
		$data['scripts'] = '<style type="text/css">@import url('.base_url().'assets/jscalendar/calendar-win2k-1.css);</style>
					<script type="text/javascript" src="'.base_url().'assets/jscalendar/calendar.js"></script>
					<script type="text/javascript" src="'.base_url().'assets/jscalendar/lang/calendar-en.js"></script>
					<script type="text/javascript" src="'.base_url().'assets/jscalendar/calendar-setup.js"></script>';

		/** @todo	create a template for this */
		$data['scripts'] .= '<script type="text/javascript">function shipment_sum(){
					var text="";
					var cart_costs = parseFloat($("cart_costs").innerHTML);
					var sum = parseFloat($("shipment_costs").innerHTML);


					if ($("shipment_cash_on_delivery").checked) { text+=" + "; text+='.$this->lang->line('main_shipping_cash_on_delivery_costs').'; sum+=parseFloat('.$this->lang->line('main_shipping_cash_on_delivery_costs').');}
					text+=" = " + sum;
					$("shipment_sum").innerHTML = text;
					$("costs_sum").innerHTML = sum + " = " + (cart_costs + sum);
					$("price").value = (cart_costs + sum);
					}
					</script>';

		$this->load->view('shop/container', $data);
	}

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
			echo "\$('user_language').value='".$lang."';";
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

		if (isset($cart['affiliate'])) return $cart['affiliate'];
		return "";
	}

	public function order()
	{
		$order_id = NULL;

		$products = $this->cart_library->get_cart();

		if ($this->input->post('user_id'))
		{
			$this->user_model->set_user($this->input->post('user_id'));
			$order_id = $this->order_model->add_order($this->input->post('user_id'));
			$this->order_model->add_order_products($order_id, $products);
		}
		else
		{
			$user_id = $this->user_model->add_user();
			$order_id = $this->order_model->add_order($user_id);
			$this->order_model->add_order_products($order_id, $products);
		}

		if ($this->input->post('shipment_cash_on_delivery') === "1"
			OR $this->input->post('shipment_cash_on_delivery') === "3")
		{
			redirect('checkout/thankyou');
		}
		else
		{
			/**
			 * @var	string $form if it's paid with paypal post with redirect
			 * @todo	create a template for this and remove hardcoded info
			 */

			$form = '<form action="https://www.paypal.com/row/cgi-bin/webscr" method="post" name="paypal_form">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="charset" value="utf-8">
				<input type="hidden" name="business" value="orders@cool-clean-quiet.com">
				<input type="hidden" name="item_name" value="Item Name">
				<input type="hidden" name="currency_code" value="EUR">
				<input type="hidden" name="amount" value="'.$this->input->post('price').'">
				<input type="hidden" name="cancel_return" value="'.site_url('shop/home').'">
				<input type="hidden" name="cancel_return" value="'.site_url('checkout/thankyou').'">
				<input type="hidden" name="invoice" value="'. $order_id .'">
				<input type="hidden" name="email" value="'.$this->input->post('user_email').'">
				<input type="hidden" name="first_name" value="'.$this->input->post('user_name').'">
				<input type="hidden" name="last_name" value="'.$this->input->post('user_surname').'">
				<input type="hidden" name="address_override" value="1">
				<input type="hidden" name="address1" value="'.$this->input->post('user_address').'">
				<input type="hidden" name="city" value="'.$this->input->post('user_city').'">
				<input type="hidden" name="zip" value="'.$this->input->post('user_zip').'">

				<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!">
				</form>
				<script type="text/javascript">document.paypal_form.submit()</script>';

			echo $form;
		}
	}

	public function thankyou()
	{
		$cart = $this->cart_library->get_cart();
		
		$rblock_data = array(
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			'parent' => array(),
			'children' => array(),
			'current' => 0
		);

		$content_data = array(
			'lang' => $this->language_library->get_language(),
		);

		$data = array(
			'contents' => $this->load->view('shop/contents/'.$this->language_library->get_language().'/thankyou_tpl', $content_data, TRUE),
			'rblock' => $this->load->view('shop/blocks/category_block_tpl', $rblock_data, TRUE),
			'title' => '',
			'pagename' => 'main_checkout',
			'lang' => $this->language_library->get_language(),
			'scripts' => '',
		);

		$this->load->view('shop/container', $data);
	}

	private function _get_price_sum($cart)
	{
		$products = array();
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
