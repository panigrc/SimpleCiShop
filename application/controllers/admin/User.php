<?php
class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->list_users();
	}

	/**
	 * @param	string	$action
	 * @param	int	$user_id
	 */
	public function view_user($action = 'add_user', $user_id = null)
	{
		$form_data = array(
			'user_id' => $user_id,
			'action' => $action,
		);

		if($action === "edit_user")
		{
			$form_data = array_merge($form_data, $this->user_model->get_user($user_id));
			$form_data['action'] = 'set_user';
		}

		$data = array(
			'contents' => $this->load->view('admin/user/user_tpl', $form_data, TRUE),
			'title' => $this->lang->line('main_manage_users'),
			'heading' => $this->lang->line('main_view_edit_user'),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	public function list_users()
	{
		$list_data['users'] = $this->user_model->get_all_user_ids();

		$data = array(
			'title' => $this->lang->line('main_manage_users'),
			'heading' => $this->lang->line('main_users'),
			'contents' => $this->load->view('admin/user/list_tpl', $list_data, TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	public function set_user()
	{
		$this->user_model->set_user();
		redirect('admin/user');
	}

	public function add_user()
	{
		$this->user_model->add_user();
		redirect('admin/user');
	}

	/**
	 * @param	int	$user_id
	 */
	public function delete_user($user_id)
	{
		$this->user_model->delete_user($user_id);
		redirect('admin/user');
	}
}
