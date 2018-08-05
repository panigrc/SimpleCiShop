<?php
class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		//$this->view_category();
		$this->list_categories();
	}

	/**
	 * @param	string	$action
	 * @param	int	$category_id
	 *
	 * @todo	Refactor, should not affect action
	 */
	public function view_category($action = 'add_category', $category_id)
	{

		$form_data = array(
			'category_id' => $category_id,
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			'action' => $action,
		);

		if($action === "edit_category")
		{
			$form_data = array_merge($form_data, $this->category_model->get_category($category_id));
			$form_data = array_merge($form_data, $this->category_model->get_category_text($category_id));
			$form_data['action'] = 'set_category';
		}

		$data = array(
			'contents' => $this->load->view('admin/category/category_tpl', $form_data, TRUE),
			'title' => "Διαχείριση Συστήματος Προϊόντων",
			'heading' => "Επεξεργασία Κατηγορίας",
		);

		$this->load->view('admin/container_tpl', $data);
	}

	/**
	 * Gets all products from database
	 */
	public function list_categories()
	{
		$list_data['categories_arr'] = $this->category_model->get_all_category_ids_recursive();

		$data = array(
			'title' => "Διαχείριση Συστήματος Προϊόντων",
			'heading' => "Λίστα Κατηγοριών",
			'contents' => $this->load->view('admin/category/list_tpl', $list_data, TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	public function set_category()
	{
		$this->category_model->set_category();
		redirect('admin/category');
	}

	public function add_category()
	{
		$this->category_model->add_category();
		redirect('admin/category');
	}
}
