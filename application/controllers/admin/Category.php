<?php
class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index() {
		//$this->view_category();
		$this->list_categories();
	}

	function view_category() {
		$categoryID = $this->uri->segment(4);

		$form_data = array();
		$form_data['categoryID'] = $categoryID;
		$form_data['categories_arr'] = $this->Category_model->get_all_category_ids_recursive();
		//print_r($form_data['categories_arr']);

		$form_data['action'] = $this->uri->segment(3, "add_category");
		if($form_data['action'] === "edit_category") {
			$form_data = array_merge($form_data, $this->Category_model->get_category($categoryID));
			$form_data = array_merge($form_data, $this->Category_model->get_category_text($categoryID));
			$form_data['action'] = 'set_category';
		}
		$data['contents'] = $this->load->view('category/category_tpl', $form_data, TRUE);

		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Επεξεργασία Κατηγορίας";

		$this->load->view('container_tpl',$data);
	}

	function list_categories()
	{
		// gets all products from database
		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Λίστα Κατηγοριών";

		$list_data['categories_arr'] = $this->Category_model->get_all_category_ids_recursive();
		$data['contents'] = $this->load->view('category/list_tpl', $list_data, TRUE);


		$this->load->view('container_tpl',$data);
	}

	function set_category() {
		$this->Category_model->set_category();
		redirect('category');
	}

	function add_category() {
		$this->Category_model->add_category();
		redirect('category');
	}
}
