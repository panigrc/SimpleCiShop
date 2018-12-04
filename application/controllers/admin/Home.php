<?php

/**
 * Class Index
 */
class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$logged_in = $this->authentication->authenticate($this->input->post('username'), $this->input->post('password'));

		if ($logged_in === TRUE)
		{
			redirect('admin/catalog');
		}

		$this->login_form();
	}

	public function login_form()
	{
		$data = array(
			'title' => $this->lang->line('main_admin_panel_login'),
			'heading' => $this->lang->line('main_admin_panel_login'),
			'contents' => $this->load->view('admin/login/login_tpl', array(), TRUE),
		);

		$this->load->view('admin/login/container_tpl', $data);
	}
}
