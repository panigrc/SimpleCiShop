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

class OrderProduct {
	use GettableSettableTrait;

	/**
	 * @var	int	$id
	 */
	protected $id;

	/**
	 * @var	int	$order_id
	 */
	protected $order_id;

	/**
	 * @var	int	$product_id
	 */
	protected $product_id;

	/**
	 * @var	int	$quantity
	 */
	protected $quantity;

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
	public function set_id(int $id): OrderProduct
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_order_id(): int
	{
		return $this->order_id;
	}

	/**
	 * @param	int	$order_id
	 * @return	$this
	 */
	public function set_order_id(int $order_id): OrderProduct
	{
		$this->order_id = $order_id;
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
	public function get_quantity(): int
	{
		return $this->quantity;
	}

	/**
	 * @param	int	$quantity
	 * @return	$this
	 */
	public function set_quantity(int $quantity): OrderProduct
	{
		$this->quantity = $quantity;
		return $this;
	}
}
