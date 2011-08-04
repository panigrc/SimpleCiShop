<?php
class User extends Controller {

	function User()
	{
		parent::Controller();
		$this->load->helper('url');	
		$this->load->helper('form');
		$this->load->model('User_model');
		$this->lang->load('main');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}

	function index() {
		//$this->view_user();
		$this->list_users();
	}
	
	function view_user() {
		$userID = $this->uri->segment(4);
	
		$form_data = array();
		$form_data['userID'] = $userID;
	
		$form_data['action'] = $this->uri->segment(3, "add_user");
		if($form_data['action'] == "edit_user") {
			$form_data = array_merge($form_data, $this->User_model->getUser($userID));
			$form_data['action'] = 'set_user';
		}
		$data['contents'] = $this->load->view('user/user_tpl', $form_data, true);
	
		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Επεξεργασία Χρήστη";
	
		$this->load->view('container_tpl',$data);
	}
	
	function list_users()
	{
		// gets all users from database
	
		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Λίστα Χρηστών";
		
		$list_data['users'] = $this->User_model->getAllUserIDs();
		$data['contents'] = $this->load->view('user/list_tpl', $list_data, true);
		
		
		$this->load->view('container_tpl',$data);
	}
	
	function set_user() {
		$this->User_model->setUser();
		redirect('user');
	}
	
	function add_user() {
		$this->User_model->addUser();
		redirect('user');
	}
	
	function delete_user()
	{
		$this->User_model->deleteUser($this->uri->segment(3));
		redirect('user');
	}
}  
?>
