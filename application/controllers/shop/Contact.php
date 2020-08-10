<?php

use Emporio\Ui\Factory\BlockFactory;

final class Contact extends CI_Controller {

	public function index($status = NULL)
	{
		$mainBlock = BlockFactory::create('contents', 5, function (CI_Controller $CI, array $vars) {
			return $CI->load->view('shop/contents/contact_tpl', $vars, TRUE);
		});

		$this->template_library->addBlock($mainBlock);

		$this->template_library->view(
			'shop/container_tpl',
			[
				'pagename' => 'main_contact',
				'title' => '',
				'status' => $status,

			]
		);
	}

	public function submit()
	{
		$this->email->from($this->config->item('contact')['from'], $this->lang->line('main_contact'));
		$this->email->to($this->config->item('contact')['to']);

		$this->email->subject($this->lang->line('main_contact_subject'));
		$message = $this->lang->line('main_full_name') . ': ' .$this->input->post('full_name') ."\n";
		$message .= $this->lang->line('main_email') . ': ' .$this->input->post('email') ."\n";
		$message .= $this->lang->line('main_phone') . ': ' .$this->input->post('phone') ."\n";
		$message .= $this->lang->line('main_company') . ': ' .$this->input->post('company') ."\n";
		$message .= $this->lang->line('main_website') . ': ' .$this->input->post('website') ."\n";
		$message .= $this->lang->line('main_message') . ":\n" . $this->input->post('message');

		//$message = str_replace('<br />',"\r\n",nl2br($message));
		$this->email->message($message);

		if (! $this->email->send())
		{
			//if ($this->input->post('notspam')!="2" OR !$this->email->send()) {
			redirect('shop/contact/index/nok');
		}
		//echo $this->email->print_debugger();

		redirect('shop/contact/index/ok');
	}
}
