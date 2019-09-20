<?php

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($status = NULL)
	{
		$data['title'] = '';
		$data['pagename'] = 'main_contact';
		$data['lang'] = $this->language_library->get_language();

		$content_data = array();
		$content_data['pagename'] = 'main_contact';
		$content_data['lang'] = $this->language_library->get_language();
		$content_data['status'] = $status;
		$data['contents'] = $this->load->view('shop/contents/contact_tpl', $content_data, TRUE);

		$rblock_data = array(
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			"parent" => array(),
			"children" => array(),
			"current" => 0
		);
		$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', $rblock_data, TRUE);
		$this->load->view('shop/container_tpl', $data);
	}

	/**
	 * @todo	remove hardcoded info
	 */
	public function submit()
	{
		$this->email->from('info@cool-clean-quiet.com', $this->lang->line('main_contact'));
		$this->email->to('info@cool-clean-quiet.com');

		$this->email->subject($this->lang->line('main_contact_subject'));
		$message = $this->lang->line('main_full_name') . ': ' .$this->input->post('full_name') ."\n";
		$message .= $this->lang->line('main_email') . ': ' .$this->input->post('email') ."\n";
		$message .= $this->lang->line('main_phone') . ': ' .$this->input->post('phone') ."\n";
		$message .= $this->lang->line('main_company') . ': ' .$this->input->post('company') ."\n";
		$message .= $this->lang->line('main_website') . ': ' .$this->input->post('website') ."\n";
		$message .= $this->lang->line('main_message') . ":\n" . $this->input->post('message');

		//$message = str_replace('<br />',"\r\n",nl2br($message));
		$this->email->message($message);

		if ( ! $this->email->send())
		{
			//if ($this->input->post('notspam')!="2" OR !$this->email->send()) {
			redirect('contact/index/nok');
		}
		//echo $this->email->print_debugger();

		redirect('contact/index/ok');
	}
}
