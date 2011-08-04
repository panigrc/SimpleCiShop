<?php

class News extends Controller {
    
	function News()
	{
		parent::Controller();
		$this->load->helper('url');	
		$this->load->helper('form');
		$this->load->model('News_model');
		$this->lang->load('main');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}
	
	function index()
	{
		$this->list_news();
	}
	
	function list_news()
	{
		// gets all products from database
		$data['title'] = "Διαχείριση Συστήματος Ακινήτων";
		$data['heading'] = "Λίστα Νέων";
		
		$news = $this->News_model->getAllNews();
		foreach($news as $new => $value) {
			$news[$new] = array_merge($news[$new], $this->News_model->getNewsText($news[$new]['newsID']));
		}
		$data['contents'] = $this->load->view('news/list_tpl', array('news' => $news), true);
		$this->load->view('container_tpl',$data);
	}
	
	function view_news()
	{
		// displays a product form
		$form_data['newsID'] = "";
		$form_data['published'] = "";
		$form_data['action'] = $this->uri->segment(3, "add_news");
		if ($form_data['action'] == "edit_news")
		{
			$form_data['newsID'] = $this->uri->segment(4);
			$form_data = array_merge($form_data, $this->News_model->getNews($form_data['newsID']));
			$form_data = array_merge($form_data, $this->News_model->getNewsText($form_data['newsID']));
		}
		
		$data['contents'] = $this->load->view('news/news_tpl', $form_data, true);
		
		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Προσθήκη/Προβολή Νέου";
		
		$this->load->view('container_tpl',$data);
	}
	
	function add_news()
	{
		// adds a product
		
        	$this->News_model->addNews();
		redirect('news');
	}
	
	function edit_news()
	{
		// updates a product
		
        	$this->News_model->setNews();
		redirect('news');
	}
	
	function delete_news()
	{
		// deletes a product
		
        	$this->News_model->deleteNews($this->uri->segment(3));
		redirect('news');
	}
}
?>
