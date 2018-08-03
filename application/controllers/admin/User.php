<?php
class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index() {
		//$this->view_user();
		$this->list_users();
	}

	function view_user() {
		$user_id = $this->uri->segment(4);

		$form_data = array();
		$form_data['user_id'] = $user_id;

		$form_data['action'] = $this->uri->segment(3, "add_user");
		if($form_data['action'] === "edit_user") {
			$form_data = array_merge($form_data, $this->user_model->get_user($user_id));
			$form_data['action'] = 'set_user';
		}
		$data['contents'] = $this->load->view('user/user_tpl', $form_data, TRUE);

		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Επεξεργασία Χρήστη";

		$this->load->view('container_tpl',$data);
	}

	function list_users()
	{
		// gets all users from database

		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Λίστα Χρηστών";

		$list_data['users'] = $this->user_model->get_all_user_ids();
		$data['contents'] = $this->load->view('user/list_tpl', $list_data, TRUE);


		$this->load->view('container_tpl',$data);
	}

	function set_user() {
		$this->user_model->set_user();
		redirect('user');
	}

	function add_user() {
		$this->user_model->add_user();
		redirect('user');
	}

	function delete_user()
	{
		$this->user_model->delete_user($this->uri->segment(3));
		redirect('user');
	}
}
