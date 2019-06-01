<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_text_entity {
	use Getter_setter_trait;

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
	public function set_product_text_id(int $product_text_id): Product_text_entity
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
	public function set_product_id(int $product_id): Product_text_entity
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
	public function set_language(string $language): Product_text_entity
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
	public function set_title(string $title): Product_text_entity
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
	public function set_description(string $description): Product_text_entity
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
	public function set_price(float $price): Product_text_entity
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
	public function set_price_old(float $price_old): Product_text_entity
	{
		$this->price_old = $price_old;
		return $this;
	}
}
