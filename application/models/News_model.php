<?php

/**
 * Class	News_model
 */
class News_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Returns an associative array with all news
	 *
	 * @return	mixed
	 * @todo	order by as parameter
	 */
	function get_all_news()
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
	function get_last_news($limit_num = NULL, $limit_from = NULL)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->order_by("published", "desc");
		if( ! is_NULL($limit_num) && !is_NULL($limit_from)) $this->db->limit($limit_num, $limit_from);

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Returns recent news
	 *
	 * @return	mixed
	 */
	function get_recent_news()
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
	 * @param	$newsID
	 * @return	mixed
	 */
	function get_news($newsID)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('news.newsID', $newsID);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$newsID
	 * @return	array
	 */
	function get_news_text($newsID)
	{
		$this->db->select('*');
		$this->db->from('news_text');
		$this->db->where('news_text.newsID', $newsID);

		$query = $this->db->get();
		$text = array();
		foreach ($query->result_array() as $row) {
			$text['news_textID_'.$row['language']] = $row['news_textID'];
			$text['title_'.$row['language']] = $row['title'];
			$text['description_'.$row['language']] = $row['description'];
		}

		return $text;
	}

	function add_news()
	{
		$arr = array('published' => time());
		$this->db->insert('news', $arr);
		$newsID = $this->db->insert_id();
		$this->add_news_text($newsID);
	}

	function set_news()
	{
		$newsID = $this->input->post('newsID');
		$this->set_news_text($newsID);
	}

	/**
	 * @param	$newsID
	 */
	function delete_news($newsID)
	{
		$this->db->delete('news', array('newsID' => $newsID));
		$this->db->delete('news_text', array('newsID' => $newsID));
	}

	/**
	 * @param	$newsID
	 * @todo	loop through languages
	 */
	function add_news_text($newsID)
	{
		$text_greek = array('newsID' => $newsID, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 'description' => $this->input->post('description_greek'));
		$text_german = array('newsID' => $newsID, 'language' => 'german', 'title' => $this->input->post('title_german'), 'description' => $this->input->post('description_german'));
		$text_english = array('newsID' => $newsID, 'language' => 'english', 'title' => $this->input->post('title_english'), 'description' => $this->input->post('description_english'));

		$this->db->insert('news_text', $text_greek);
		$this->db->insert('news_text', $text_german);
		$this->db->insert('news_text', $text_english);
	}

	/**
	 * @param	$newsID
	 * @todo	loop through languages
	 */
	function set_news_text($newsID)
	{
		$text_greek = array('newsID' => $newsID, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 'description' => $this->input->post('description_greek'));
		$text_german = array('newsID' => $newsID, 'language' => 'german', 'title' => $this->input->post('title_german'), 'description' => $this->input->post('description_german'));
		$text_english = array('newsID' => $newsID, 'language' => 'english', 'title' => $this->input->post('title_english'), 'description' => $this->input->post('description_english'));

		$this->db->where('news_textID', $this->input->post('news_textID_greek'));
		$this->db->update('news_text', $text_greek);
		$this->db->where('news_textID', $this->input->post('news_textID_german'));
		$this->db->update('news_text', $text_german);
		$this->db->where('news_textID', $this->input->post('news_textID_english'));
		$this->db->update('news_text', $text_english);
	}
}
