<?php

class Catalog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Product_model');
		$this->load->model('Meta_model');
		$this->load->model('Category_model');
		$this->load->library('ajax');
		$this->lang->load('main');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}

	function index()
	{
		$this->list_product();
	}

	function list_product()
	{
		// gets all products from database

		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Λίστα Προϊόντων";

		$products = $this->Product_model->get_all_products();
		foreach($products as $product => $value) {
			$products[$product] = array_merge($products[$product], $this->Product_model->get_product_text($products[$product]['productID']));
			$products[$product]['category_text'] = $this->Category_model->get_category_names($this->Product_model->get_product_categories($products[$product]['productID']));
		}
		$data['contents'] = $this->load->view('catalog/list_tpl', array('products' => $products), TRUE);
		$this->load->view('container_tpl',$data);
	}

	function view_product()
	{
		// displays a product form
		$form_data['productID'] = "";
		$form_data['nicename'] = "";
		$form_data['published'] = "";
		$form_data['action'] = $this->uri->segment(3, "add_product");
		$form_data['categories_arr'] = $this->Category_model->get_all_category_ids_recursive();
		$form_data['product_categories'] = array();
		$form_data['all_meta'] = $this->Meta_model->get_all_meta();
		$form_data['product_meta'] = array();

		if ($form_data['action'] === "edit_product")
		{
			$form_data['productID'] = $this->uri->segment(4);
			$form_data = array_merge($form_data, $this->Product_model->get_product($form_data['productID']));
			$form_data = array_merge($form_data, $this->Product_model->get_product_text($form_data['productID']));
			$form_data['product_categories'] = $this->Product_model->get_product_categories($form_data['productID']);
			$form_data['product_meta'] = $this->Product_model->get_product_meta($form_data['productID']);
			$form_data['images_arr'] = $this->Product_model->get_product_image($form_data['productID']);
		}

		$data['contents'] = $this->load->view('catalog/product_tpl', $form_data, TRUE);

		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Προσθήκη/Προβολή Προϊόντος";

		$this->load->view('container_tpl',$data);
	}

	function add_product()
	{
		// adds a product

        	$this->Product_model->add_product();
		redirect('catalog');
	}

	function edit_product()
	{
		// updates a product

        	$this->Product_model->set_product();
		redirect('catalog');
	}

	function delete_product()
	{
		// deletes a product

        	$this->Product_model->delete_product($this->uri->segment(3));
		redirect('catalog');
	}

	function ajaxset_stock($productID, $stock) {
		echo $this->Product_model->set_product_stock($productID, $stock);
	}
}
