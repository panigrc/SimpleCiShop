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
	 * @var	int	$newsTextId
	 */
	protected $newsTextId;

	/**
	 * @var	int	$newsId
	 */
	protected $newsId;

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
	public function getNewsTextId(): int
	{
		return $this->newsTextId;
	}

	/**
	 * @param	int	$newsTextId
	 * @return	$this
	 */
	public function setNewsTextId(int $newsTextId): NewsText
	{
		$this->newsTextId = $newsTextId;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getNewsId(): int
	{
		return $this->newsId;
	}

	/**
	 * @param	int	$newsId
	 * @return	$this
	 */
	public function setNewsId(int $newsId): NewsText
	{
		$this->newsId = $newsId;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getLanguage(): string
	{
		return $this->language;
	}

	/**
	 * @param	string	$language
	 * @return	$this
	 */
	public function setLanguage(string $language): NewsText
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param	string	$title
	 * @return	$this
	 */
	public function setTitle(string $title): NewsText
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getBody(): string
	{
		return $this->body;
	}

	/**
	 * @param	string	$body
	 * @return	$this
	 */
	public function setBody(string $body): NewsText
	{
		$this->body = $body;
		return $this;
	}
}
