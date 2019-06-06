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

class Order {
	use GettableSettableTrait;

	/**
	 * @var	int	$order_id
	 */
	protected $order_id;

	/**
	 * @var	int	$user_id
	 */
	protected $user_id;

	/**
	 * @var	int	$created
	 */
	protected $created;

	/**
	 * @var	int	$status
	 */
	protected $status;

	/**
	 * @var	bool	$shipment_express
	 */
	protected $shipment_express;

	/**
	 * @var	bool	$shipment_to_door
	 */
	protected $shipment_to_door;

	/**
	 * @var	bool	$shipment_cash_on_delivery
	 */
	protected $shipment_cash_on_delivery;

	/**
	 * @var	float	$price
	 */
	protected $price;

	/**
	 * @var	int	$coupon_id
	 */
	protected $coupon_id;

	/**
	 * @var	string	$questionnaire
	 */
	protected $questionnaire;

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
	public function set_order_id(int $order_id): Order
	{
		$this->order_id = $order_id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_user_id(): int
	{
		return $this->user_id;
	}

	/**
	 * @param	int	$user_id
	 * @return	$this
	 */
	public function set_user_id(int $user_id): Order
	{
		$this->user_id = $user_id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_created(): int
	{
		return $this->created;
	}

	/**
	 * @param	int	$created
	 * @return	$this
	 */
	public function set_created(int $created): Order
	{
		$this->created = $created;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_status(): int
	{
		return $this->status;
	}

	/**
	 * @param	int	$status
	 * @return	$this
	 */
	public function set_status(int $status): Order
	{
		$this->status = $status;
		return $this;
	}

	/**
	 * @return	bool
	 */
	public function is_shipment_express(): bool
	{
		return $this->shipment_express;
	}

	/**
	 * @param	bool	$shipment_express
	 * @return	$this
	 */
	public function set_shipment_express(bool $shipment_express): Order
	{
		$this->shipment_express = $shipment_express;
		return $this;
	}

	/**
	 * @return	bool
	 */
	public function is_shipment_to_door(): bool
	{
		return $this->shipment_to_door;
	}

	/**
	 * @param	bool	$shipment_to_door
	 * @return	$this
	 */
	public function set_shipment_to_door(bool $shipment_to_door): Order
	{
		$this->shipment_to_door = $shipment_to_door;
		return $this;
	}

	/**
	 * @return	bool
	 */
	public function is_shipment_cash_on_delivery(): bool
	{
		return $this->shipment_cash_on_delivery;
	}

	/**
	 * @param	bool	$shipment_cash_on_delivery
	 * @return	$this
	 */
	public function set_shipment_cash_on_delivery(bool $shipment_cash_on_delivery): Order
	{
		$this->shipment_cash_on_delivery = $shipment_cash_on_delivery;
		return $this;
	}

	/**
	 * @return	float
	 */
	public function get_price(): float
	{
		return $this->price;
	}

	/**
	 * @param	float	$price
	 * @return	$this
	 */
	public function set_price(float $price): Order
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_coupon_id(): int
	{
		return $this->coupon_id;
	}

	/**
	 * @param	int	$coupon_id
	 * @return	$this
	 */
	public function set_coupon_id(int $coupon_id): Order
	{
		$this->coupon_id = $coupon_id;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_questionnaire(): string
	{
		return $this->questionnaire;
	}

	/**
	 * @param	string	$questionnaire
	 * @return	$this
	 */
	public function set_questionnaire(string $questionnaire): Order
	{
		$this->questionnaire = $questionnaire;
		return $this;
	}
}
