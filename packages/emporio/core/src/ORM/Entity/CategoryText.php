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

namespace Emporio\Core\ORM\Entity;

use Emporio\Core\Traits\GettableSettableTrait;

class CategoryText {
	use GettableSettableTrait;

	/**
	 * @var	int	$id
	 */
	protected $id;

	/**
	 * @var	int	$category_id
	 */
	protected $category_id;

	/**
	 * @var	string	$language
	 */
	protected $language;

	/**
	 * @var	string	$name
	 */
	protected $name;

	/**
	 * @var	string	$description
	 */
	protected $description;

	/**
	 * @return	int
	 */
	public function get_id(): int
	{
		return $this->id;
	}

	/**
	 * @param	int	$id
	 * @return	$this
	 */
	public function set_id(int $id): CategoryText
	{
		$this->id = $id;
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
