<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();	
		$this->load->helper('url');	
		$this->load->helper('form');
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->load->model('Search_model');
		$this->load->model('News_model');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}
	
	function index($lang=null)
	{
        	redirect('catalog/index/greek');
	}

	function guide($lang)
	{
		if($lang!="greek") redirect('catalog/index/greek');
		
		$this->config->set_item('language', $lang);
		$this->lang->load('main');
		
		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $lang;
		
		$content_data = array();
		$data['contents'] = $this->load->view('contents/'.$lang.'/guide_tpl', $content_data, true);
		
		$rblock_data = array();
		$rblock_data['lang'] = $lang;
		
		$data['rblock'] = $this->load->view('blocks/category_block_tpl', array('categories_arr' => ($this->Category_model->getAllCategoryIDs_rec()), "parent" => array(), "childs" => array(), "current" => 0, "lang" => $lang), true);
			
		$this->load->view('container', $data);
	
	}
	
	function transactions($lang)
	{
		if($lang!="greek") redirect('catalog/index/greek');
		
		$this->config->set_item('language', $lang);
		$this->lang->load('main');
		
		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $lang;
		
		$content_data = array();
		$data['contents'] = $this->load->view('contents/'.$lang.'/transactions_tpl', $content_data, true);
		
		$rblock_data = array();
		$rblock_data['lang'] = $lang;
		
		$data['rblock'] = $this->load->view('blocks/category_block_tpl', array('categories_arr' => ($this->Category_model->getAllCategoryIDs_rec()), "parent" => array(), "childs" => array(), "current" => 0, "lang" => $lang), true);
		
		$this->load->view('container', $data);
	
	}
	
	function secure($lang)
	{
		if($lang!="greek") redirect('catalog/index/greek');
		
		$this->config->set_item('language', $lang);
		$this->lang->load('main');
		
		$data['title'] = '';
		$data['pagename'] = '';
		$data['lang'] = $lang;
		
		$content_data = array();
		$data['contents'] = $this->load->view('contents/'.$lang.'/secure_tpl', $content_data, true);
		
		$rblock_data = array();
		$rblock_data['lang'] = $lang;
		
		$data['rblock'] = $this->load->view('blocks/category_block_tpl', array('categories_arr' => ($this->Category_model->getAllCategoryIDs_rec()), "parent" => array(), "childs" => array(), "current" => 0, "lang" => $lang), true);
		
		$this->load->view('container', $data);
	
	}

}
?>
