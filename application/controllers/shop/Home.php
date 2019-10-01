<?php

/**
 * Class	Index
 */
class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('shop/catalog');
	}

	public function guide()
	{
		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $this->language_library->get_language();

		$content_data = array();
		$data['contents'] = $this->load->view('shop/contents/'.$this->language_library->get_language().'/guide_tpl', $content_data, TRUE);

		$this->load->view('shop/container_tpl', $data);
	}

	public function transactions()
	{
		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $this->language_library->get_language();

		$content_data = array();
		$data['contents'] = $this->load->view('shop/contents/'.$this->language_library->get_language().'/transactions_tpl', $content_data, TRUE);

		$this->load->view('shop/container_tpl', $data);
	}

	public function secure()
	{
		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $this->language_library->get_language();

		$content_data = array();
		$data['contents'] = $this->load->view('shop/contents/'.$this->language_library->get_language().'/secure_tpl', $content_data, TRUE);

		$this->load->view('shop/container_tpl', $data);
	}
}
