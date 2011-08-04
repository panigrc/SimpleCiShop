<?php

class Login extends Controller {

	function Login()
	{
		parent::Controller();
		$this->load->helper('url');	
		$this->load->helper('form');
		$this->lang->load('main');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}
	
	function index()
	{
		$logged_in = $this->authentication->authenticate($this->input->post('username'), $this->input->post('password'));
		if($logged_in == false) $this->login_form();
		else redirect('catalog');
	}
	
	function login_form()
	{
		// gets all products from database
		$data['title'] = "Είσοδος Στο Σύστημα Διαχείρισης";
		$data['heading'] = "Είσοδος Στο Σύστημα Διαχείρισης";
		
		$data['contents'] = $this->load->view('login/login_tpl', array(), true);
		
		
		$this->load->view('login/container_tpl',$data);
	}
}
?>
