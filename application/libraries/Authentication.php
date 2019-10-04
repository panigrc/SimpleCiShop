<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class	Authentication
 * @todo	implement ion_auth2 as Authentication Library
 */
class Authentication {

	/**
	 * @var	CI_Controller	$CI
	 */
	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper('url');

		$logged_in = $this->CI->session->userdata('logged_in');
	}

	public function authenticate($username, $password)
	{
		$this->CI =& get_instance();
		$this->CI->load->helper('url');
		if ($username === "panigrc" && $password === "cool_clean_quiet")
		{
			//if (md5($username) === 'a13b5073a57146fb633fd061f4aaca90' && md5($password) === '446eb7e1ded9810e6e1eca2ab6575a83') {
			$this->CI->session->set_userdata(array('logged_in' => '1'));
			return TRUE;
		}
		else
		{
			$this->CI->session->set_userdata(array('logged_in' => '0'));
			return FALSE;
		}
	}
}
