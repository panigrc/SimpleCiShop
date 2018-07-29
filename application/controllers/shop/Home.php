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

		$rblock_data = array(
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			'parent' => array(),
			'children' => array(),
			'current' => 0,
			'lang' => $this->language_library->get_language(),
		);

		$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', $rblock_data, TRUE);

		$this->load->view('shop/container', $data);
	}

	public function transactions()
	{
		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $this->language_library->get_language();

		$content_data = array();
		$data['contents'] = $this->load->view('shop/contents/'.$this->language_library->get_language().'/transactions_tpl', $content_data, TRUE);

		$rblock_data = array(
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			"parent" => array(),
			'children' => array(),
			'current' => 0,
			'lang' => $this->language_library->get_language()
		);

		$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', $rblock_data, TRUE);

		$this->load->view('shop/container', $data);
	}

	public function secure()
	{
		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $this->language_library->get_language();

		$content_data = array();
		$data['contents'] = $this->load->view('shop/contents/'.$this->language_library->get_language().'/secure_tpl', $content_data, TRUE);

		$rblock_data = array(
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			'parent' => array(),
			'children' => array(),
			"current" => 0,
			'lang' => $this->language_library->get_language()
		);

		$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', $rblock_data, TRUE);

		$this->load->view('shop/container', $data);
	}
}
