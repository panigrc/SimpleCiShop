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
	 * @var	int	$categoryTextId
	 */
	private $categoryTextId;

	/**
	 * @var	int	$categoryId
	 */
	private $categoryId;

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
	public function getCategoryTextId(): int
	{
		return $this->categoryTextId;
	}

	/**
	 * @param	int	$categoryTextId
	 * @return	$this
	 */
	public function setCategoryTextId(int $categoryTextId): CategoryText
	{
		$this->categoryTextId = $categoryTextId;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getCategoryId(): int
	{
		return $this->categoryId;
	}

	/**
	 * @param	int	$categoryId
	 * @return	$this
	 */
	public function setCategoryId(int $categoryId): CategoryText
	{
		$this->categoryId = $categoryId;
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
	public function setLanguage(string $language): CategoryText
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param	string	$name
	 * @return	$this
	 */
	public function setName(string $name): CategoryText
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getDescription(): string
	{
		return $this->description;
	}

	/**
	 * @param	string	$description
	 * @return	$this
	 */
	public function setDescription(string $description): CategoryText
	{
		$this->description = $description;
		return $this;
	}
}
