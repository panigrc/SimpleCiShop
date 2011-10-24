<?php

class Contact extends Controller {
	var $lang;
	function Contact()
	{
		parent::Controller();	
        	$this->load->helper('url');	
		$this->load->helper('form');
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->load->model('Search_model');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}
	
	function index($lang=null, $status=null)
	{
		if($lang!="greek") redirect('catalog/index/greek');
		
		$this->config->set_item('language', $lang);
		$this->lang->load('main');
		
		$data['title'] = '';
		$data['pagename'] = 'main_contact';
		$data['lang'] = $lang;
		
		$content_data = array();
		$content_data['pagename'] = 'main_contact';
		$content_data['lang'] = $lang;
		$content_data['status'] = $status;
		$data['contents'] = $this->load->view('contents/contact_tpl', $content_data, true);
		
		$data['rblock'] = $this->load->view('blocks/category_block_tpl', array('categories_arr' => ($this->Category_model->getAllCategoryIDs_rec()), "parent" => array(), "childs" => array(), "current" => 0), true);
		$this->load->view('container', $data);
	}
	function submit($lang=null)
	{
		$this->config->set_item('language', $lang);
		$this->lang->load('main');
		
		$this->load->library('email');
		
		$this->email->from('info@cool-clean-quiet.com', 'Επικοινωνία');
		$this->email->to('info@cool-clean-quiet.com');
		
		$this->email->subject('Επικοινωνία από το site');
		$message = $this->lang->line('main_full_name') . ': ' .$this->input->post('full_name') ."\n";
		$message .= $this->lang->line('main_email') . ': ' .$this->input->post('email') ."\n";
		$message .= $this->lang->line('main_phone') . ': ' .$this->input->post('phone') ."\n";
		$message .= $this->lang->line('main_company') . ': ' .$this->input->post('company') ."\n";
		$message .= $this->lang->line('main_website') . ': ' .$this->input->post('website') ."\n";
		$message .= $this->lang->line('main_message') . ":\n" . $this->input->post('message');
		
		//$message = str_replace('<br />',"\r\n",nl2br($message));
		$this->email->message($message);
		
		if (!$this->email->send()) {
			//if ($this->input->post('notspam')!="2" || !$this->email->send()) {
			redirect('contact/index/'. $lang .'/nok');
		}
		//echo $this->email->print_debugger();
		
		redirect('contact/index/'. $lang .'/ok');
	}
}
?>
