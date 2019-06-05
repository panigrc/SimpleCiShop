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

class Category {
	use GettableSettableTrait;

	/**
	 * @var	int	$categoryId
	 */
	protected $categoryId;

	/**
	 * @var	int	$parentCategoryId
	 */
	protected $parentCategoryId;

	/**
	 * @var	string	$slug
	 */
	protected $slug;

	/**
	 * @param    int $categoryId
	 * @return    $this
	 */
	public function setCategoryId(int $categoryId): Category
	{
		$this->categoryId = $categoryId;
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
	 * @param	int	$parentCategoryId
	 * @return	$this
	 */
	public function setParentCategoryId(int $parentCategoryId): Category
	{
		$this->parentCategoryId = $parentCategoryId;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getParentCategoryId(): int
	{
		return $this->parentCategoryId;
	}

	/**
	 * @param	string	$slug
	 * @return	$this
	 */
	public function setSlug(string $slug): Category
	{
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getSlug(): string
	{
		return $this->slug;
	}
}
