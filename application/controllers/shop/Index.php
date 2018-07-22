<?php

/**
 * Class	Index
 */
class Index extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index($lang = NULL)
	{
		redirect('shop/index/greek');
	}

	function guide($lang)
	{
		if($lang!="greek") redirect('shop/index/greek');

		$this->config->set_item('language', $lang);


		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $lang;

		$content_data = array();
		$data['contents'] = $this->load->view('shop/contents/'.$lang.'/guide_tpl', $content_data, TRUE);

		$rblock_data = array();
		$rblock_data['lang'] = $lang;

		$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', array('categories_arr' => ($this->category_model->get_all_category_ids_recursive()), "parent" => array(), "childs" => array(), "current" => 0, "lang" => $lang), TRUE);

		$this->load->view('shop/container', $data);

	}

	function transactions($lang)
	{
		if($lang!="greek") redirect('shop/index/greek');

		$this->config->set_item('language', $lang);


		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $lang;

		$content_data = array();
		$data['contents'] = $this->load->view('shop/contents/'.$lang.'/transactions_tpl', $content_data, TRUE);

		$rblock_data = array();
		$rblock_data['lang'] = $lang;

		$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', array('categories_arr' => ($this->category_model->get_all_category_ids_recursive()), "parent" => array(), "childs" => array(), "current" => 0, "lang" => $lang), TRUE);

		$this->load->view('shop/container', $data);

	}

	function secure($lang)
	{
		if($lang!="greek") redirect('shop/index/greek');

		$this->config->set_item('language', $lang);


		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $lang;

		$content_data = array();
		$data['contents'] = $this->load->view('shop/contents/'.$lang.'/secure_tpl', $content_data, TRUE);

		$rblock_data = array();
		$rblock_data['lang'] = $lang;

		$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', array('categories_arr' => ($this->category_model->get_all_category_ids_recursive()), "parent" => array(), "childs" => array(), "current" => 0, "lang" => $lang), TRUE);

		$this->load->view('shop/container', $data);

	}

}
