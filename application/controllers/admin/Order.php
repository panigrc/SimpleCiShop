<?php
class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->list_orders();
	}

	/**
	 * @param	int	$order_id
	 * @param	int	$user_id
	 */
	public function view_order($order_id, $user_id)
	{
		$user = $this->user_model->get_user($user_id);
		$order = $this->order_model->get_order($order_id);
		$products = $this->order_model->get_order_products($order_id);

		foreach($products as $product => $value)
		{
			$products[$product] = array_merge($products[$product], $this->product_model->get_product_text($products[$product]['product_id']));
		}

		/** @todo	this is not right */
		$this->language_library->set_language($user['language']);

		$data = array(
			'lang' => $user['language'],
			'user' => $user,
			'order' => $order,
			'products' => $products,
			'title' => $this->lang->line('main_manage_orders'),
			'heading' => $this->lang->line('main_view_edit_order'),
			'contents' => "contents",
		);

		$this->load->view('admin/order/print_tpl', $data);
	}

	public function list_orders()
	{
		$list_data['orders'] = $this->order_model->get_all_orders();

		$data = array(
			'title' => $this->lang->line('main_manage_orders'),
			'heading' => $this->lang->line('main_orders'),
			'contents' => $this->load->view('admin/order/list_tpl', $list_data, TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	public function set_order()
	{
		$this->order_model->set_order($this->input->post('order_id'), $this->_build_order_data());
		redirect('admin/order');
	}

	public function add_order()
	{
		$this->order_model->add_order($this->_build_order_data());
		redirect('admin/order');
	}

	/**
	 * @param	int	$order_id
	 */
	public function delete_order($order_id)
	{
		$this->order_model->delete_order($order_id);
		redirect('admin/order');
	}

	/**
	 * @param	$user_id
	 * @deprecated
	 */
	public function ajaxget_user($user_id)
	{
		$data = $this->user_model->get_user($user_id);
		$this->load->view('admin/order/user_tpl', $data);
	}

	/**
	 * @param	$order_id
	 * @param	$user_id
	 * @deprecated
	 */
	public function ajaxget_products($order_id, $user_id)
	{
		$user = $this->user_model->get_user($user_id);
		$products = $this->order_model->get_order_products($order_id);

		foreach($products as $product => $value)
		{
			$products[$product] = array_merge($products[$product], $this->product_model->get_product_text($products[$product]['product_id']));
		}

		$this->load->view('admin/order/products_tpl', array('products' => $products, 'user' => $user));
	}

	/**
	 * @param	$order_id
	 * @param	$status
	 */
	public function set_status($order_id, $status)
	{
		$this->order_model->set_order_status($order_id, $status);
		redirect('admin/order');
	}

	private function _build_order_data(): array
	{
		return [
			'user_id'                   => $this->input->post('user_id'),
			'created'                   => $this->input->post('created'),
			'status'                    => $this->input->post('status'),
			'shipment_express'          => $this->input->post('shipment_express'),
			'shipment_to_door'          => $this->input->post('shipment_to_door'),
			'shipment_cash_on_delivery' => $this->input->post('shipment_cash_on_delivery'),
			'price'                     => $this->input->post('price'),
			'coupon_id'                 => $this->input->post('coupon_id'),
			'questionnaire'             => $this->input->post('questionnaire'),
		];
	}
}
