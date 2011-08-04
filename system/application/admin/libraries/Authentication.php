<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication {

	function Authentication ($params=null) {
		$obj =& get_instance();
		$obj->load->helper('url');
		
		$logged_in = $obj->session->userdata('logged_in');
		if($logged_in == 1) { }
		elseif($obj->uri->segment(1,0) != "login") {
			redirect('login');
		}
	}
	
	function authenticate ($username, $password) {
		$obj =& get_instance();
		$obj->load->helper('url');
		if($username == "panigrc" && $password == "cool_clean_quiet") {
			//if(md5($username) == 'a13b5073a57146fb633fd061f4aaca90' && md5($password) == '446eb7e1ded9810e6e1eca2ab6575a83') {
			$obj->session->set_userdata(array('logged_in' => '1'));
			return true;
		}
		else {
			$obj->session->set_userdata(array('logged_in' => '0'));
			return false;
		}
	}
}
?>
