<?php
class Category extends Controller {

	function Category()
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

	function index($lang=NULL, $countryID=1)
	{
		if($lang!="greek") redirect('catalog/index/greek');

		$this->config->set_item('language', $lang);
		$this->lang->load('main');

		$content_data['lang'] = $lang;
		$content_data['countryID'] = $countryID;
		$data['contents'] = $this->load->view('contents/map_tpl', $content_data, TRUE);

		$rblock_data = array();
		$data['rblock'] = $this->load->view('blocks/'.$lang.'/home_tpl', $rblock_data, TRUE);

		$data['title'] = $this->lang->line('main_map');
		$data['lang'] = $lang;
		$data['pagename'] = '';

		$this->load->view('container',$data);

	}

	function view_category($lang=NULL, $categoryID=NULL)
	{
		if($lang!="greek") redirect('catalog/index/greek');

		$this->config->set_item('language', $lang);
		$this->lang->load('main');

		$content_data['lang'] = $lang;
		$content_data['categoryID'] = $categoryID;
		//print_r($content_data['categories_arr']);
		$data['contents'] = $this->load->view('contents/category_tpl', $content_data, TRUE);

		$rblock_data = array();
		$data['rblock'] = $this->load->view('blocks/'.$lang.'/home_tpl', $rblock_data, TRUE);

		$data['title'] = "";
		$data['lang'] = $lang;
		$data['pagename'] = '';

		$this->load->view('container',$data);
	}
}
