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

namespace Emporio\Core\Entity;

use Emporio\Core\Traits\GettableSettableTrait;

class CategoryText {
	use GettableSettableTrait;

	/**
	 * @var	int	$category_text_id
	 */
	private $category_text_id;

	/**
	 * @var	int	$category_id
	 */
	private $category_id;

	/**
	 * @var	string	$language
	 */
	private $language;

	/**
	 * @var	string	$name
	 */
	private $name;

	/**
	 * @var	string	$description
	 */
	private $description;

	/**
	 * @return	int
	 */
	public function get_category_text_id(): int
	{
		return $this->category_text_id;
	}

	/**
	 * @param	int	$category_text_id
	 * @return	$this
	 */
	public function set_category_text_id(int $category_text_id): CategoryText
	{
		$this->category_text_id = $category_text_id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_category_id(): int
	{
		return $this->category_id;
	}

	/**
	 * @param	int	$category_id
	 * @return	$this
	 */
	public function set_category_id(int $category_id): CategoryText
	{
		$this->category_id = $category_id;
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
	public function set_language(string $language): CategoryText
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_name(): string
	{
		return $this->name;
	}

	/**
	 * @param	string	$name
	 * @return	$this
	 */
	public function set_name(string $name): CategoryText
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_description(): string
	{
		return $this->description;
	}

	/**
	 * @param	string	$description
	 * @return	$this
	 */
	public function set_description(string $description): CategoryText
	{
		$this->description = $description;
		return $this;
	}
}
