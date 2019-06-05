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

class Product {
	use GettableSettableTrait;

	/**
	 * @var	int	$productId
	 */
	protected $productId;

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
	public function getProductId(): int
	{
		return $this->productId;
	}

	/**
	 * @param	int	$productId
	 * @return	$this
	 */
	public function setProductId(int $productId): Product
	{
		$this->productId = $productId;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getSlug(): string
	{
		return $this->slug;
	}

	/**
	 * @param	string	$slug
	 * @return	$this
	 */
	public function setSlug(string $slug): Product
	{
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getStock(): int
	{
		return $this->stock;
	}

	/**
	 * @param	int	$stock
	 * @return	$this
	 */
	public function setStock(int $stock): Product
	{
		$this->stock = $stock;
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
	public function setPublished(int $published): Product
	{
		$this->published = $published;
		return $this;
	}
}
