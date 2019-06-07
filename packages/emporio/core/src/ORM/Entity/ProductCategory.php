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

class ProductCategory {
	use GettableSettableTrait;

	/**
	 * @var	int	$relation_id
	 */
	protected $relation_id;

	/**
	 * @var	int	$product_id
	 */
	protected $product_id;

	/**
	 * @var	int	$category_id
	 */
	protected $category_id;

	/**
	 * @return	int
	 */
	public function get_relation_id(): int
	{
		return $this->relation_id;
	}

	/**
	 * @param	int	$relation_id
	 * @return	$this
	 */
	public function set_relation_id(int $relation_id): OrderProduct
	{
		$this->relation_id = $relation_id;
		return $this;
	}

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
	public function set_product_id(int $product_id): OrderProduct
	{
		$this->product_id = $product_id;
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
	public function set_category_id(int $category_id): OrderProduct
	{
		$this->category_id = $category_id;
		return $this;
	}
}
