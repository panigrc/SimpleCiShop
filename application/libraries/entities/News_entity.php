<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_entity {
	use Getter_setter_trait;

	/**
	 * @var	int	$news_id
	 */
	private $news_id;

	/**
	 * @var	int	$published
	 */
	private $published;

	/**
	 * @var	int	$updated
	 */
	private $updated;

	/**
	 * @return	int
	 */
	public function getNewsId(): int
	{
		return $this->news_id;
	}

	/**
	 * @param	int	$news_id
	 * @return	$this
	 */
	public function setNewsId(int $news_id): News_entity
	{
		$this->news_id = $news_id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getPublished(): int
	{
		return $this->published;
	}

	/**
	 * @param	int	$published
	 * @return	$this
	 */
	public function setPublished(int $published): News_entity
	{
		$this->published = $published;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getUpdated(): int
	{
		return $this->updated;
	}

	/**
	 * @param	int	$updated
	 * @return	$this
	 */
	public function setUpdated(int $updated): News_entity
	{
		$this->updated = $updated;
		return $this;
	}
}
