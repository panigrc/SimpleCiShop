<?php

/**
 * Class	News_model
 */
class News_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Returns an associative array with all news
	 *
	 * @return	mixed
	 * @todo	order by as parameter
	 */
	public function get_all_news()
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->order_by("published", "desc");

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Returns an associative array with all news
	 *
	 * @param	null|int	$limit_num
	 * @param	null|int	$limit_from
	 * @return	mixed
	 */
	public function get_last_news($limit_num = NULL, $limit_from = NULL)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->order_by("published", "desc");
		if ( ! is_NULL($limit_num) && !is_NULL($limit_from)) $this->db->limit($limit_num, $limit_from);

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Returns recent news
	 *
	 * @return	mixed
	 */
	public function get_recent_news()
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->order_by("published", "desc");
		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * Returns an associative array with a news item
	 *
	 * @param	$news_id
	 * @return	mixed
	 */
	public function get_news($news_id)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('news.news_id', $news_id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$news_id
	 * @return	array
	 */
	public function get_news_text($news_id)
	{
		$this->db->select('*');
		$this->db->from('news_text');
		$this->db->where('news_text.news_id', $news_id);

		$query = $this->db->get();
		$text = array();
		foreach ($query->result_array() as $row)
		{
			$text['news_text_id_'.$row['language']] = $row['news_text_id'];
			$text['title_'.$row['language']] = $row['title'];
			$text['description_'.$row['language']] = $row['description'];
		}

		return $text;
	}

	public function add_news()
	{
		$arr = array('published' => time());
		$this->db->insert('news', $arr);
		$news_id = $this->db->insert_id();
		$this->add_news_text($news_id);
	}

	public function set_news()
	{
		$news_id = $this->input->post('news_id');
		$this->set_news_text($news_id);
	}

	/**
	 * @param	$news_id
	 */
	public function delete_news($news_id)
	{
		$this->db->delete('news', array('news_id' => $news_id));
		$this->db->delete('news_text', array('news_id' => $news_id));
	}

	/**
	 * @param	$news_id
	 * @todo	loop through languages
	 */
	public function add_news_text($news_id)
	{
		$text_greek = array('news_id' => $news_id, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 'description' => $this->input->post('description_greek'));
		$text_german = array('news_id' => $news_id, 'language' => 'german', 'title' => $this->input->post('title_german'), 'description' => $this->input->post('description_german'));
		$text_english = array('news_id' => $news_id, 'language' => 'english', 'title' => $this->input->post('title_english'), 'description' => $this->input->post('description_english'));

		$this->db->insert('news_text', $text_greek);
		$this->db->insert('news_text', $text_german);
		$this->db->insert('news_text', $text_english);
	}

	/**
	 * @param	$news_id
	 * @todo	loop through languages
	 */
	public function set_news_text($news_id)
	{
		$text_greek = array('news_id' => $news_id, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 'description' => $this->input->post('description_greek'));
		$text_german = array('news_id' => $news_id, 'language' => 'german', 'title' => $this->input->post('title_german'), 'description' => $this->input->post('description_german'));
		$text_english = array('news_id' => $news_id, 'language' => 'english', 'title' => $this->input->post('title_english'), 'description' => $this->input->post('description_english'));

		$this->db->where('news_text_id', $this->input->post('news_text_id_greek'));
		$this->db->update('news_text', $text_greek);
		$this->db->where('news_text_id', $this->input->post('news_text_id_german'));
		$this->db->update('news_text', $text_german);
		$this->db->where('news_text_id', $this->input->post('news_text_id_english'));
		$this->db->update('news_text', $text_english);
	}
}
