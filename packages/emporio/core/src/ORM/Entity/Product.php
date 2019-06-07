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

class Product {
	use GettableSettableTrait;

	/**
	 * @var	int	$product_id
	 */
	protected $product_id;

	/**
	 * @var	string	$slug
	 */
	protected $slug;

	/**
	 * @var	int	$stock
	 */
	protected $stock;

	/**
	 * @var	int	$published
	 */
	protected $published;

	/**
	 * @return	int
	 */
	public function get_product_id(): int
	{
		return $this->product_id;
	}

	/**
	 * @param	int	$product_id
	 * @return	$this
	 */
	public function set_product_id(int $product_id): Product
	{
		$this->product_id = $product_id;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_slug(): string
	{
		return $this->slug;
	}

	/**
	 * @param	string	$slug
	 * @return	$this
	 */
	public function set_slug(string $slug): Product
	{
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_stock(): int
	{
		return $this->stock;
	}

	/**
	 * @param	int	$stock
	 * @return	$this
	 */
	public function set_stock(int $stock): Product
	{
		$this->stock = $stock;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_published(): int
	{
		return $this->published;
	}

	/**
	 * @param	int	$published
	 * @return	$this
	 */
	public function set_published(int $published): Product
	{
		$this->published = $published;
		return $this;
	}
}
