<?php

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->list_news();
	}

	public function list_news()
	{
		$news = $this->news_model->get_all_news();
		foreach($news as $new => $value)
		{
			$news[$new] = array_merge($news[$new], $this->news_model->get_article_text($news[$new]['news_id']));
		}

		$data = array(
			'title' => $this->lang->line('main_manage_news'),
			'heading' => $this->lang->line('main_news'),
			'contents' => $this->load->view('admin/news/list_tpl', array('news' => $news), TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	/**
	 * @param	string	$action
	 * @param	int	$news_id
	 */
	public function view_news($action = 'add_news', $news_id = null)
	{
		$form_data['news_id'] = "";
		$form_data['published'] = "";
		$form_data['action'] = $action;

		if ($form_data['action'] === "edit_news")
		{
			$form_data['news_id'] = $news_id;
			$form_data = array_merge($form_data, $this->news_model->get_article($form_data['news_id']));
			$form_data = array_merge($form_data, $this->news_model->get_article_text($form_data['news_id']));
		}

		$data = array(
			'title' => $this->lang->line('main_manage_news'),
			'heading' => $this->lang->line('main_view_edit_news'),
			'contents' => $this->load->view('admin/news/news_tpl', $form_data, TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	public function add_news()
	{
 		$article_id = $this->news_model->add_article();

		$this->_process_texts($article_id);

		redirect('admin/news');
	}

	public function edit_news()
	{
		$this->_process_texts($this->input->post('news_id'));

		redirect('admin/news');
	}

	/**
	 * @param	int	$news_id
	 */
	public function delete_news($news_id)
	{
		$this->news_model->delete_article($news_id);
		redirect('admin/news');
	}

	/**
	 * @param	int	$article_id
	 */
	private function _process_texts(int $article_id)
	{
		foreach ($this->config->item('supported_languages') as $supported_language)
		{
			if (empty($this->input->post("news_text_id_{$supported_language}")))
			{
				$this->news_model->add_article_text(
					$article_id,
					$supported_language,
					$this->input->post("title_{$supported_language}"),
					$this->input->post("body_{$supported_language}")
				);

				continue;
			}

			$this->news_model->set_article_text(
				$this->input->post("news_text_id_{$supported_language}"),
				$this->input->post("title_{$supported_language}"),
				$this->input->post("body_{$supported_language}")
			);
		}
	}
}
