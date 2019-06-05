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

class Category {
	use GettableSettableTrait;

	/**
	 * @var	int	$category_id
	 */
	protected $category_id;

	/**
	 * @var	int	$parent_category_id
	 */
	protected $parent_category_id;

	/**
	 * @var	string	$slug
	 */
	protected $slug;

	/**
	 * @param    int $category_id
	 * @return    $this
	 */
	public function set_category_id(int $category_id): Category
	{
		$this->category_id = $category_id;
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
	 * @param	int	$parent_category_id
	 * @return	$this
	 */
	public function set_parent_category_id(int $parent_category_id): Category
	{
		$this->parent_category_id = $parent_category_id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_parent_category_id(): int
	{
		return $this->parent_category_id;
	}

	/**
	 * @param	string	$slug
	 * @return	$this
	 */
	public function set_slug(string $slug): Category
	{
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_slug(): string
	{
		return $this->slug;
	}
}
