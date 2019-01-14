<?php

class Catalog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->list_products();
	}

	/**
	 * Gets all products from database
	 */
	public function list_products()
	{
		$products = $this->product_model->get_all_products();

		foreach($products as $product => $value)
		{
			$products[$product] = array_merge($products[$product], $this->product_model->get_product_text($products[$product]['product_id']));
			$products[$product]['category_text'] = $this->category_model->get_category_names($this->product_model->get_product_categories($products[$product]['product_id']));
		}

		$data = array(
			'title' => $this->lang->line('main_manage_products'),
			'heading' => $this->lang->line('main_products'),
			'contents' => $this->load->view('admin/catalog/list_tpl', array('products' => $products), TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	/**
	 * Displays a product form
	 *
	 * @param	string	$action
	 * @param	int	$product_id
	 */
	public function view_product($action = 'add_product', $product_id)
	{
		$form_data = array(
			'product_id' => "",
			'nicename' => "",
			'published' => "",
			'action' => $action,
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			'product_categories' => array(),
			'all_meta' => $this->meta_model->get_all_meta(),
			'product_meta' => array(),
		);

		if ($action === "edit_product")
		{
			$form_data['product_id'] = $product_id;
			$form_data = array_merge($form_data, $this->product_model->get_product($form_data['product_id']));
			$form_data = array_merge($form_data, $this->product_model->get_product_text($form_data['product_id']));
			$form_data['product_categories'] = $this->product_model->get_product_categories($form_data['product_id']);
			$form_data['product_meta'] = $this->product_model->get_product_meta($form_data['product_id']);
			$form_data['images_arr'] = $this->product_model->get_product_image($form_data['product_id']);
		}

		$data = array(
			'contents' => $this->load->view('admin/catalog/product_tpl', $form_data, TRUE),
			'title' => $this->lang->line('main_manage_products'),
			'heading' => $this->lang->line('main_view_edit_product'),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	public function add_product()
	{
		$this->product_model->add_product();
		redirect('admin/catalog');
	}

	public function edit_product()
	{
		$this->product_model->set_product();
		redirect('admin/catalog');
	}

	/**
	 * @param	int	$product_id
	 */
	public function delete_product($product_id)
	{
		$this->product_model->delete_product($product_id);
		redirect('admin/catalog');
	}

	/**
	 * @param	int	$product_id
	 * @param	int	$stock
	 */
	public function set_stock($product_id, $stock)
	{
		$this->product_model->set_product_stock($product_id, $stock);
		redirect('admin/catalog');
	}
}
