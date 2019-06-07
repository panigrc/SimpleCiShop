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

class Coupon {
	use GettableSettableTrait;

	/**
	 * @var	int	$coupon_id
	 */
	protected $coupon_id;

	/**
	 * @var	string	$coupon_number
	 */
	protected $coupon_number;

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
	public function get_coupon_id(): int
	{
		return $this->coupon_id;
	}

	/**
	 * @param	int	$coupon_id
	 * @return	$this
	 */
	public function set_coupon_id(int $coupon_id): Coupon
	{
		$this->coupon_id = $coupon_id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function get_coupon_number(): string
	{
		return $this->coupon_number;
	}

	/**
	 * @param	string	$coupon_number
	 * @return	$this
	 */
	public function set_coupon_number(string $coupon_number): Coupon
	{
		$this->coupon_number = $coupon_number;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_used(): int
	{
		return $this->used;
	}

	/**
	 * @param	int	$used
	 * @return	$this
	 */
	public function set_used(int $used): Coupon
	{
		$this->used = $used;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_discount(): int
	{
		return $this->discount;
	}

	/**
	 * @param	int	$discount
	 * @return	$this
	 */
	public function set_discount(int $discount): Coupon
	{
		$this->discount = $discount;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_expires(): int
	{
		return $this->expires;
	}

	/**
	 * @param	int	$expires
	 * @return	$this
	 */
	public function set_expires(int $expires): Coupon
	{
		$this->expires = $expires;
		return $this;
	}
}
