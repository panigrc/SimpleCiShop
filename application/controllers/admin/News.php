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
			$news[$new] = array_merge($news[$new], $this->news_model->get_news_text($news[$new]['news_id']));
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
	public function view_news($action = 'add_news', $news_id)
	{
		$form_data['news_id'] = "";
		$form_data['published'] = "";
		$form_data['action'] = $action;

		if ($form_data['action'] === "edit_news")
		{
			$form_data['news_id'] = $news_id;
			$form_data = array_merge($form_data, $this->news_model->get_news($form_data['news_id']));
			$form_data = array_merge($form_data, $this->news_model->get_news_text($form_data['news_id']));
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
 		$this->news_model->add_news();
		redirect('admin/news');
	}

	public function edit_news()
	{
		$this->news_model->set_news();
		redirect('admin/news');
	}

	/**
	 * @param	int	$news_id
	 */
	public function delete_news($news_id)
	{
		$this->news_model->delete_news($news_id);
		redirect('admin/news');
	}
}
