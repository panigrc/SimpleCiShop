<?php

/*
 * This file is part of the Emporio package.
 *
 * (c) Nikolaos Papagiannopoulos
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Emporio\Core\Entities;

use Emporio\Core\Traits\GettableSettableTrait;

class NewsText {
	use GettableSettableTrait;

	/**
	 * @var	int	$news_text_id
	 */
	protected $news_text_id;

	/**
	 * @var	int	$news_id
	 */
	protected $news_id;

	/**
	 * @var	string	$language
	 */
	protected $language;

	/**
	 * @var	string	$title
	 */
	protected $title;

	/**
	 * @var	string	$body
	 */
	protected $body;

	/**
	 * @return	int
	 */
	public function get_news_text_id(): int
	{
		return $this->news_text_id;
	}

	/**
	 * @param	int	$news_text_id
	 * @return	$this
	 */
	public function set_news_text_id(int $news_text_id): NewsText
	{
		$this->news_text_id = $news_text_id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_news_id(): int
	{
		return $this->news_id;
	}

	/**
	 * @param	int	$news_id
	 * @return	$this
	 */
	public function set_news_id(int $news_id): NewsText
	{
		$this->news_id = $news_id;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_language(): string
	{
		return $this->language;
	}

	/**
	 * @param	string	$language
	 * @return	$this
	 */
	public function set_language(string $language): NewsText
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_title(): string
	{
		return $this->title;
	}

	/**
	 * @param	string	$title
	 * @return	$this
	 */
	public function set_title(string $title): NewsText
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_body(): string
	{
		return $this->body;
	}

	/**
	 * @param	string	$body
	 * @return	$this
	 */
	public function set_body(string $body): NewsText
	{
		$this->body = $body;
		return $this;
	}
}
