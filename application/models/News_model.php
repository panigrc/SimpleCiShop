<?php

class News_model extends CI_Model {

	/**
	 * Returns an associative array with all news
	 *
	 * @param string $order_by
	 * @param string $direction ASC, DESC or RANDOM
	 * @param int|null $limit
	 * @param int|null $offset
	 * @return array
	 */
	public function get_all_news(
		string $order_by = 'published',
		string $direction = 'DESC',
		?int $limit = NULL,
		?int $offset = 0
	): array
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->order_by($order_by, $direction);
		if ($limit !== null)
		{
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param int $id
	 * @return null|array
	 */
	public function get_article(int $id): ?array
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('news.news_id', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param int $article_id
	 * @return array
	 */
	public function get_article_text(int $article_id): array
	{
		$this->db->select('*');
		$this->db->from('news_texts');
		$this->db->where('news_texts.news_id', $article_id);

		$query = $this->db->get();
		$text = [];
		foreach ($query->result_array() as $row)
		{
			$text['news_text_id_'.$row['language']] = $row['news_text_id'];
			$text['title_'.$row['language']] = $row['title'];
			$text['body_'.$row['language']] = $row['body'];
		}

		return $text;
	}

	/**
	 * @return int Article Id
	 */
	public function add_article(): int
	{
		$this->db->insert('news', ['published' => time()]);
		return $this->db->insert_id();
	}

	/**
	 * @param int $article_id
	 */
	public function delete_article(int $article_id): void
	{
		$this->db->delete('news', ['news_id' => $article_id]);
		$this->db->delete('news_texts', ['news_id' => $article_id]);
	}

	/**
	 * @param int $article_id
	 * @param string $language
	 * @param string $title
	 * @param string $body
	 */
	public function add_article_text(int $article_id, string $language, string $title, string $body): void
	{
		$this->db->insert('news_texts', [
			'news_id'  => $article_id,
			'language' => $language,
			'title'    => $title,
			'body'     => $body,
		]);
	}

	/**
	 * @param int $article_text_id
	 * @param string $title
	 * @param string $body
	 */
	public function set_article_text(int $article_text_id, string $title, string $body): void
	{
		$this->db->where('news_text_id', $article_text_id);
		$this->db->update('news_texts', [
			'title'    => $title,
			'body'     => $body,
		]);
	}
}
