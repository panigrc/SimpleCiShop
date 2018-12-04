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
		$this->language_library->set_language($user['user_language']);

		$data = array(
			'lang' => $user['user_language'],
			'user' => $user,
			'order' => $order,
			'products' => $products,
			'title' => $this->lang->line('main_manage_orders'),
			'heading' => $this->lang->line('main_view_edit_order'),
			'contents' => "contents",
		);

		/*$form_data = array();
		$form_data['order_id'] = $order_id;

		$form_data['action'] = $this->uri->segment(3, "add_order");
		if($form_data['action'] === "edit_order") {
			$form_data = array_merge($form_data, $this->order_model->get_order($order_id));
			$form_data['action'] = 'set_order';
		}
		$data['contents'] = $this->load->view('admin/order/print_tpl', $form_data, TRUE);*/

		$this->load->view('admin/order/print_tpl', $data);
	}

	public function list_orders()
	{
		$list_data['orders'] = $this->order_model->get_all_order_ids();

		$data = array(
			'title' => $this->lang->line('main_manage_orders'),
			'heading' => $this->lang->line('main_orders'),
			'contents' => $this->load->view('admin/order/list_tpl', $list_data, TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	/**
	 * @todo	this won't work :P
	 * @see Order_model::set_order()
	 */
	public function set_order()
	{
		$this->order_model->set_order();
		redirect('admin/order');
	}

	/**
	 * @todo	must be moved to user controller
	 */
	public function add_order()
	{
		$this->order_model->add_order();
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

	public function ajaxget_user($user_id)
	{
		$data = $this->user_model->get_user($user_id);
		$this->load->view('admin/order/user_tpl', $data);
	}

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

	public function ajaxset_status($order_id, $status)
	{
		echo $this->order_model->set_order_status($order_id, $status);
	}
}
