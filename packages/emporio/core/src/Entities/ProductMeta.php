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

class ProductMeta {
	use GettableSettableTrait;

	/**
	 * @var	int	$metaId
	 */
	protected $metaId;

	/**
	 * @var	int	$productId
	 */
	protected $productId;

	/**
	 * @var	string	$metaKey
	 */
	protected $metaKey;

	/**
	 * @var	string	$metaValue
	 */
	protected $metaValue;

	/**
	 * @return	int
	 */
	public function getMetaId(): int
	{
		return $this->metaId;
	}

	/**
	 * @param	int	$metaId
	 * @return	$this
	 */
	public function setMetaId(int $metaId): ProductMeta
	{
		$this->metaId = $metaId;
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
	public function setProductId(int $productId): ProductMeta
	{
		$this->productId = $productId;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getMetaKey(): string
	{
		return $this->metaKey;
	}

	/**
	 * @param	string	$metaKey
	 * @return	$this
	 */
	public function setMetaKey(string $metaKey): ProductMeta
	{
		$this->metaKey = $metaKey;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getMetaValue(): string
	{
		return $this->metaValue;
	}

	/**
	 * @param	string	$metaValue
	 * @return	$this
	 */
	public function setMetaValue(string $metaValue): ProductMeta
	{
		$this->metaValue = $metaValue;
		return $this;
	}
}
