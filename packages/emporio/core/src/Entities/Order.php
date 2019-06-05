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
	 * @var	int	$orderId
	 */
	protected $orderId;

	/**
	 * @var	int	$userId
	 */
	protected $userId;

	/**
	 * @var	int	$created
	 */
	protected $created;

	/**
	 * @var	int	$status
	 */
	protected $status;

	/**
	 * @var	bool	$shipmentExpress
	 */
	protected $shipmentExpress;

	/**
	 * @var	bool	$shipmentToDoor
	 */
	protected $shipmentToDoor;

	/**
	 * @var	bool	$shipmentCashOnDelivery
	 */
	protected $shipmentCashOnDelivery;

	/**
	 * @var	float	$price
	 */
	protected $price;

	/**
	 * @var	int	$couponId
	 */
	protected $couponId;

	/**
	 * @var	string	$questionnaire
	 */
	protected $questionnaire;

	/**
	 * @return	int
	 */
	public function getOrderId(): int
	{
		return $this->orderId;
	}

	/**
	 * @param	int	$orderId
	 * @return	$this
	 */
	public function setOrderId(int $orderId): Order
	{
		$this->orderId = $orderId;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getUserId(): int
	{
		return $this->userId;
	}

	/**
	 * @param	int	$userId
	 * @return	$this
	 */
	public function setUserId(int $userId): Order
	{
		$this->userId = $userId;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getCreated(): int
	{
		return $this->created;
	}

	/**
	 * @param	int	$created
	 * @return	$this
	 */
	public function setCreated(int $created): Order
	{
		$this->created = $created;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getStatus(): int
	{
		return $this->status;
	}

	/**
	 * @param	int	$status
	 * @return	$this
	 */
	public function setStatus(int $status): Order
	{
		$this->status = $status;
		return $this;
	}

	/**
	 * @return	bool
	 */
	public function isShipmentExpress(): bool
	{
		return $this->shipmentExpress;
	}

	/**
	 * @param	bool	$shipmentExpress
	 * @return	$this
	 */
	public function setShipmentExpress(bool $shipmentExpress): Order
	{
		$this->shipmentExpress = $shipmentExpress;
		return $this;
	}

	/**
	 * @return	bool
	 */
	public function is_shipment_to_door(): bool
	{
		return $this->shipmentToDoor;
	}

	/**
	 * @param	bool	$shipmentToDoor
	 * @return	$this
	 */
	public function set_shipment_to_door(bool $shipmentToDoor): Order
	{
		$this->shipmentToDoor = $shipmentToDoor;
		return $this;
	}

	/**
	 * @return	bool
	 */
	public function is_shipment_cash_on_delivery(): bool
	{
		return $this->shipmentCashOnDelivery;
	}

	/**
	 * @param	bool	$shipmentCashOnDelivery
	 * @return	$this
	 */
	public function set_shipment_cash_on_delivery(bool $shipmentCashOnDelivery): Order
	{
		$this->shipmentCashOnDelivery = $shipmentCashOnDelivery;
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
	public function setPrice(float $price): Order
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getCouponId(): int
	{
		return $this->couponId;
	}

	/**
	 * @param	int	$couponId
	 * @return	$this
	 */
	public function setCouponId(int $couponId): Order
	{
		$this->couponId = $couponId;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function getQuestionnaire(): string
	{
		return $this->questionnaire;
	}

	/**
	 * @param	string	$questionnaire
	 * @return	$this
	 */
	public function setQuestionnaire(string $questionnaire): Order
	{
		$this->questionnaire = $questionnaire;
		return $this;
	}
}
