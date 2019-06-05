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

namespace Emporio\Core\Entity;

class ProductText {
	use GettableSettableTrait;

	/**
	 * @var	int	$product_text_id
	 */
	protected $product_text_id;

	/**
	 * @var	int	$product_id
	 */
	protected $product_id;

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
	 * @var	float	$price_old
	 */
	protected $price_old;

	/**
	 * @return	int
	 */
	public function get_product_text_id(): int
	{
		return $this->product_text_id;
	}

	/**
	 * @param	int	$product_text_id
	 * @return	$this
	 */
	public function set_product_text_id(int $product_text_id): ProductText
	{
		$this->product_text_id = $product_text_id;
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
	public function set_product_id(int $product_id): ProductText
	{
		$this->product_id = $product_id;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_language(): string
	{
		return $this->language;
	}

	/**
	 * @param	string	$language
	 * @return	$this
	 */
	public function set_language(string $language): ProductText
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_title(): string
	{
		return $this->title;
	}

	/**
	 * @param	string	$title
	 * @return	$this
	 */
	public function set_title(string $title): ProductText
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_description(): string
	{
		return $this->description;
	}

	/**
	 * @param	string	$description
	 * @return	$this
	 */
	public function set_description(string $description): ProductText
	{
		$this->description = $description;
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
	public function set_price(float $price): ProductText
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return	float
	 */
	public function get_price_old(): float
	{
		return $this->price_old;
	}

	/**
	 * @param	float	$price_old
	 * @return	$this
	 */
	public function set_price_old(float $price_old): ProductText
	{
		$this->price_old = $price_old;
		return $this;
	}
}
