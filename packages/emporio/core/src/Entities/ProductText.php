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

class ProductText {
	use GettableSettableTrait;

	/**
	 * @var	int	$productTextId
	 */
	protected $productTextId;

	/**
	 * @var	int	$productId
	 */
	protected $productId;

	/**
	 * @var	string	$language
	 */
	protected $language;

	/**
	 * @var	string	$title
	 */
	protected $title;

	/**
	 * @var	string	$description
	 */
	protected $description;

	/**
	 * @var	float	$price
	 */
	protected $price;

	/**
	 * @var	float	$priceOld
	 */
	protected $priceOld;

	/**
	 * @return	int
	 */
	public function getProductTextId(): int
	{
		return $this->productTextId;
	}

	/**
	 * @param	int	$productTextId
	 * @return	$this
	 */
	public function setProductTextId(int $productTextId): ProductText
	{
		$this->productTextId = $productTextId;
		return $this;
	}

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
	public function setProductId(int $productId): ProductText
	{
		$this->productId = $productId;
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
	public function setLanguage(string $language): ProductText
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
	public function setTitle(string $title): ProductText
	{
		$this->title = $title;
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
	public function setDescription(string $description): ProductText
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return	float
	 */
	public function getPrice(): float
	{
		return $this->price;
	}

	/**
	 * @param	float	$price
	 * @return	$this
	 */
	public function setPrice(float $price): ProductText
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return	float
	 */
	public function getPriceOld(): float
	{
		return $this->priceOld;
	}

	/**
	 * @param	float	$priceOld
	 * @return	$this
	 */
	public function setPriceOld(float $priceOld): ProductText
	{
		$this->priceOld = $priceOld;
		return $this;
	}
}
