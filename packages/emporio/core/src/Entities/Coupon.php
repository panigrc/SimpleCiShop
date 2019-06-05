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

class Coupon {
	use GettableSettableTrait;

	/**
	 * @var	int	$couponId
	 */
	protected $couponId;

	/**
	 * @var	string	$couponNumber
	 */
	protected $couponNumber;

	/**
	 * @var	int	$used
	 */
	protected $used;

	/**
	 * @var	int	$discount
	 */
	protected $discount;

	/**
	 * @var	int	$expires
	 */
	protected $expires;

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
	public function setCouponId(int $couponId): Coupon
	{
		$this->couponId = $couponId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCouponNumber(): string
	{
		return $this->couponNumber;
	}

	/**
	 * @param	string	$couponNumber
	 * @return	$this
	 */
	public function setCouponNumber(string $couponNumber): Coupon
	{
		$this->couponNumber = $couponNumber;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getUsed(): int
	{
		return $this->used;
	}

	/**
	 * @param	int	$used
	 * @return	$this
	 */
	public function setUsed(int $used): Coupon
	{
		$this->used = $used;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getDiscount(): int
	{
		return $this->discount;
	}

	/**
	 * @param	int	$discount
	 * @return	$this
	 */
	public function setDiscount(int $discount): Coupon
	{
		$this->discount = $discount;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getExpires(): int
	{
		return $this->expires;
	}

	/**
	 * @param	int	$expires
	 * @return	$this
	 */
	public function setExpires(int $expires): Coupon
	{
		$this->expires = $expires;
		return $this;
	}
}
