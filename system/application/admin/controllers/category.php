<?php
class Category extends Controller {

	function Category()
	{
		parent::Controller();
		$this->load->helper('url');	
		$this->load->helper('form');
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->lang->load('main');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}

	function index() {
		//$this->view_category();
		$this->list_categories();
	}

	function view_category() {
		$categoryID = $this->uri->segment(4);
		
		$form_data = array();
		$form_data['categoryID'] = $categoryID;
		$form_data['categories_arr'] = $this->Category_model->getAllCategoryIDs_rec();
		//print_r($form_data['categories_arr']);
		
		$form_data['action'] = $this->uri->segment(3, "add_category");
		if($form_data['action'] == "edit_category") {
			$form_data = array_merge($form_data, $this->Category_model->getCategory($categoryID));
			$form_data = array_merge($form_data, $this->Category_model->getCategoryText($categoryID));
			$form_data['action'] = 'set_category';
		}
		$data['contents'] = $this->load->view('category/category_tpl', $form_data, true);
		
		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Επεξεργασία Κατηγορίας";
		
		$this->load->view('container_tpl',$data);
	}

	function list_categories()
	{
		// gets all products from database
		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Λίστα Κατηγοριών";
		
		$list_data['categories_arr'] = $this->Category_model->getAllCategoryIDs_rec();
		$data['contents'] = $this->load->view('category/list_tpl', $list_data, true);
		
		
		$this->load->view('container_tpl',$data);
	}

	function set_category() {
		$this->Category_model->setCategory();
		redirect('category');
	}
	
	function add_category() {
		$this->Category_model->addCategory();
		redirect('category');
	}
}  
?>
