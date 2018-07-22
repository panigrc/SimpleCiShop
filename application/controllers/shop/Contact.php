<?php

class Contact extends CI_Controller {
	var $lang;
	function __construct()
	{
		parent::__construct();
	}

	function index($lang=NULL, $status=NULL)
	{
		if($lang!="greek") redirect('shop/index/greek');

		$this->config->set_item('language', $lang);


		$data['title'] = '';
		$data['pagename'] = 'main_contact';
		$data['lang'] = $lang;

		$content_data = array();
		$content_data['pagename'] = 'main_contact';
		$content_data['lang'] = $lang;
		$content_data['status'] = $status;
		$data['contents'] = $this->load->view('shop/contents/contact_tpl', $content_data, TRUE);

		$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', array('categories_arr' => ($this->category_model->get_all_category_ids_recursive()), "parent" => array(), "childs" => array(), "current" => 0), TRUE);
		$this->load->view('shop/container', $data);
	}
	function submit($lang=NULL)
	{
		$this->config->set_item('language', $lang);

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

		if ( ! $this->email->send()) {
			//if ($this->input->post('notspam')!="2" OR !$this->email->send()) {
			redirect('contact/index/'. $lang .'/nok');
		}
		//echo $this->email->print_debugger();

		redirect('contact/index/'. $lang .'/ok');
	}
}
