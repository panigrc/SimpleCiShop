<?php
class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->list_categories();
	}

	/**
	 * @param	string		$action
	 * @param	int|null	$category_id
	 */
	public function view_category($action = 'add_category', $category_id = null)
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
			'title' => $this->lang->line('main_manage_categories'),
			'heading' => $this->lang->line('main_view_edit_category'),
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
			'title' => $this->lang->line('main_manage_categories'),
			'heading' => $this->lang->line('main_manage_categories'),
			'contents' => $this->load->view('admin/category/list_tpl', $list_data, TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	public function set_category()
	{
		$this->category_model->set_category(
			$this->input->post('category_id'),
			$this->input->post('slug'),
			$this->input->post('parent_category_id')
		);

		$this->_process_texts($this->input->post('category_id'));

		redirect('admin/category');
	}

	public function add_category()
	{
		$category_id = $this->category_model->add_category(
			$this->input->post('slug'),
			$this->input->post('parent_category_id')
		);

		$this->_process_texts($category_id);

		redirect('admin/category');
	}

	/**
	 * @param	int	$category_id
	 */
	private function _process_texts(int $category_id)
	{
		foreach ($this->config->item('supported_languages') as $supported_language)
		{
			if (empty($this->input->post("category_text_id_{$supported_language}")))
			{
				$this->category_model->add_category_text(
					$category_id,
					$supported_language,
					$this->input->post("category_name_{$supported_language}"),
					$this->input->post("category_description_{$supported_language}")
				);

				continue;
			}

			$this->category_model->set_category_text(
				$this->input->post("category_text_id_{$supported_language}"),
				$this->input->post("category_name_{$supported_language}"),
				$this->input->post("category_description_{$supported_language}")
			);
		}

	}
}
