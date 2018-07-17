<?php
class News extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('News_model');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
	}

	function index($lang=NULL)
	{
		if($lang!="greek") redirect('shop/index/greek');
		$this->config->set_item('language', $lang);
		$this->lang->load('main');

		$content_data = array();

		$content_data['lang'] = $lang;
		$content_data['news'] = $this->_getNewsData();
		$content_data['pagination'] = $this->_pagination();

		$data['contents'] = $this->load->view('contents/news_tpl', $content_data, TRUE);

		$data['rblock'] = $this->load->view('blocks/'.$lang.'/home_tpl', array(), TRUE);

		$data['title'] = '';
		$data['pagename'] = 'main_news';
		$data['lang'] = $lang;

		$this->load->view('container', $data);
	}

	function _getNewsData()
	{
		$current_page = $this->uri->segment(4);
		$current_page = empty($current_page) === FALSE ? $current_page : 0;

		$news = $this->News_model->get_last_news(5, $current_page);
		foreach($news as $new => $value) {
			$news[$new] = array_merge($news[$new], $this->News_model->get_news_text($news[$new]['newsID']));
		}
		return $news;
	}

	function _pagination($per_page=5) {
		$lang = $this->config->item('language');

		$this->load->library('pagination');

		$config['base_url'] = site_url('news/index/'.$lang.'/');
		$config['total_rows'] = count($this->News_model->get_all_news());
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 4;
		$config['num_links'] = 50;
		$config['first_link'] = $this->lang->line('main_page_first');
		$config['last_link'] = $this->lang->line('main_page_last');

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}
}
