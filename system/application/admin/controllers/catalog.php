<?php

class Catalog extends Controller {

	function Catalog()
	{
		parent::Controller();
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
		
		$products = $this->Product_model->getAllProducts();
		foreach($products as $product => $value) {
			$products[$product] = array_merge($products[$product], $this->Product_model->getProductText($products[$product]['productID']));
			$products[$product]['category_text'] = $this->Category_model->getCategoryNames($this->Product_model->getProductCategories($products[$product]['productID']));
		}
		$data['contents'] = $this->load->view('catalog/list_tpl', array('products' => $products), true);
		$this->load->view('container_tpl',$data);
	}
	
	function view_product()
	{
		// displays a product form
		$form_data['productID'] = "";
		$form_data['nicename'] = "";
		$form_data['published'] = "";
		$form_data['action'] = $this->uri->segment(3, "add_product");
		$form_data['categories_arr'] = $this->Category_model->getAllCategoryIDs_rec();
		$form_data['product_categories'] = array();
		$form_data['all_meta'] = $this->Meta_model->getAllMeta();
		$form_data['product_meta'] = array();
		
		if ($form_data['action'] == "edit_product")
		{
			$form_data['productID'] = $this->uri->segment(4);
			$form_data = array_merge($form_data, $this->Product_model->getProduct($form_data['productID']));
			$form_data = array_merge($form_data, $this->Product_model->getProductText($form_data['productID']));
			$form_data['product_categories'] = $this->Product_model->getProductCategories($form_data['productID']);
			$form_data['product_meta'] = $this->Product_model->getProductMeta($form_data['productID']);            
			$form_data['images_arr'] = $this->Product_model->getProductImage($form_data['productID']);
		}
		
		$data['contents'] = $this->load->view('catalog/product_tpl', $form_data, true);
		
		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Προσθήκη/Προβολή Προϊόντος";
		
		$this->load->view('container_tpl',$data);
	}
	
	function add_product()
	{
		// adds a product
		
        	$this->Product_model->addProduct();
		redirect('catalog');
	}
	
	function edit_product()
	{
		// updates a product
		
        	$this->Product_model->setProduct();
		redirect('catalog');
	}
	
	function delete_product()
	{
		// deletes a product
		
        	$this->Product_model->deleteProduct($this->uri->segment(3));
		redirect('catalog');
	}
	
	function ajaxset_stock($productID, $stock) {
		echo $this->Product_model->setProductStock($productID, $stock);
	}
}
?>
