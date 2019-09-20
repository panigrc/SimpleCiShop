<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param int|null $current_page
	 */
	public function index($current_page = NULL)
	{
		$content_data = array(
			'lang' => $this->language_library->get_language(),
			'news' => $this->_get_news_data($current_page ?: 0),
			'pagination' => $this->_pagination(),
		);

		$data = array(
			'contents' => $this->load->view('shop/contents/news_tpl', $content_data, TRUE),
			'rblock' => $this->load->view('shop/blocks/'.$this->language_library->get_language().'/home_tpl', array(), TRUE),
			'title' => '',
			'pagename' => 'main_news',
			'lang' => $this->language_library->get_language(),
		);

		$this->load->view('shop/container_tpl', $data);
	}

	/**
	 * @param int $current_page
	 * @return mixed
	 *
	 */
	private function _get_news_data($current_page = 0)
	{
		$news = $this->news_model->get_last_news(5, $current_page);
		foreach ($news as $new => $value)
		{
			$news[$new] = array_merge($news[$new], $this->news_model->get_news_text($news[$new]['news_id']));
		}
		return $news;
	}

	private function _pagination($per_page = 5)
	{
		$config = array(
			'base_url' => site_url('news/index/'),
			'total_rows' => count($this->news_model->get_all_news()),
			'per_page' => $per_page,
			'uri_segment' => 4,
			'num_links' => 50,
			'first_link' => $this->lang->line('main_page_first'),
			'last_link' => $this->lang->line('main_page_last'),
		);
		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}
}
