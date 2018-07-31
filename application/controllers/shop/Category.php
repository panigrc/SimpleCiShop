<?php

/**
 * Class Category
 * @deprecated wll be removed in the future
 */
class Category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index($lang=NULL, $countryID=1)
	{
		if ($lang!="greek") redirect('shop/home/greek');

		$this->config->set_item('language', $lang);


		$content_data['lang'] = $lang;
		$content_data['countryID'] = $countryID;
		$data['contents'] = $this->load->view('shop/contents/map_tpl', $content_data, TRUE);

		$rblock_data = array();
		$data['rblock'] = $this->load->view('shop/blocks/'.$lang.'/home_tpl', $rblock_data, TRUE);

		$data['title'] = $this->lang->line('main_map');
		$data['lang'] = $lang;
		$data['pagename'] = '';

		$this->load->view('shop/container',$data);

	}

	function view_category($lang=NULL, $categoryID=NULL)
	{
		if ($lang!="greek") redirect('shop/home/greek');

		$this->config->set_item('language', $lang);


		$content_data['lang'] = $lang;
		$content_data['categoryID'] = $categoryID;
		//print_r($content_data['categories_arr']);
		$data['contents'] = $this->load->view('shop/contents/category_tpl', $content_data, TRUE);

		$rblock_data = array();
		$data['rblock'] = $this->load->view('shop/blocks/'.$lang.'/home_tpl', $rblock_data, TRUE);

		$data['title'] = "";
		$data['lang'] = $lang;
		$data['pagename'] = '';

		$this->load->view('shop/container',$data);
	}
}
