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

class ProductImage {
	use GettableSettableTrait;

	/**
	 * @var	int	$productImageId
	 */
	protected $productImageId;

	/**
	 * @var	int	$productId
	 */
	protected $productId;

	/**
	 * @var	string	$title
	 */
	protected $title;

	/**
	 * @var	string	$thumb
	 */
	protected $thumb;

	/**
	 * @var	string	$big
	 */
	protected $big;

	/**
	 * @var	bool	$main
	 */
	protected $main;

	/**
	 * @return	int
	 */
	public function getProductImageId(): int
	{
		return $this->productImageId;
	}

	/**
	 * @param	int	$productImageId
	 * @return	$this
	 */
	public function setProductImageId(int $productImageId): ProductImage
	{
		$this->productImageId = $productImageId;
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
	public function setProductId(int $productId): ProductImage
	{
		$this->productId = $productId;
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
	public function setTitle(string $title): ProductImage
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getThumb(): string
	{
		return $this->thumb;
	}

	/**
	 * @param	string	$thumb
	 * @return	$this
	 */
	public function setThumb(string $thumb): ProductImage
	{
		$this->thumb = $thumb;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getBig(): string
	{
		return $this->big;
	}

	/**
	 * @param	string	$big
	 * @return	$this
	 */
	public function setBig(string $big): ProductImage
	{
		$this->big = $big;
		return $this;
	}

	/**
	 * @return	bool
	 */
	public function isMain(): bool
	{
		return $this->main;
	}

	/**
	 * @param	bool	$main
	 * @return	$this
	 */
	public function setMain(bool $main): ProductImage
	{
		$this->main = $main;
		return $this;
	}
}
