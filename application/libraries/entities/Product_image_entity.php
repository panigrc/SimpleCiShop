<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_image_entity {
	use Getter_setter_trait;

	/**
	 * @var	int	$product_image_id
	 */
	protected $product_image_id;

	/**
	 * @var	int	$product_id
	 */
	protected $product_id;

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
	public function get_product_image_id(): int
	{
		return $this->product_image_id;
	}

	/**
	 * @param	int	$product_image_id
	 * @return	$this
	 */
	public function set_product_image_id(int $product_image_id): Product_image_entity
	{
		$this->product_image_id = $product_image_id;
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
	public function set_product_id(int $product_id): Product_image_entity
	{
		$this->product_id = $product_id;
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
	public function set_title(string $title): Product_image_entity
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_thumb(): string
	{
		return $this->thumb;
	}

	/**
	 * @param	string	$thumb
	 * @return	$this
	 */
	public function set_thumb(string $thumb): Product_image_entity
	{
		$this->thumb = $thumb;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_big(): string
	{
		return $this->big;
	}

	/**
	 * @param	string	$big
	 * @return	$this
	 */
	public function set_big(string $big): Product_image_entity
	{
		$this->big = $big;
		return $this;
	}

	/**
	 * @return	bool
	 */
	public function is_main(): bool
	{
		return $this->main;
	}

	/**
	 * @param	bool	$main
	 * @return	$this
	 */
	public function set_main(bool $main): Product_image_entity
	{
		$this->main = $main;
		return $this;
	}
}
