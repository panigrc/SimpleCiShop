<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_meta_entity {
	use Getter_setter_trait;

	/**
	 * @var	int	$meta_id
	 */
	protected $meta_id;

	/**
	 * @var	int	$product_id
	 */
	protected $product_id;

	/**
	 * @var	string	$meta_key
	 */
	protected $meta_key;

	/**
	 * @var	string	$meta_value
	 */
	protected $meta_value;

	/**
	 * @return	int
	 */
	public function get_meta_id(): int
	{
		return $this->meta_id;
	}

	/**
	 * @param	int	$meta_id
	 * @return	$this
	 */
	public function set_meta_id(int $meta_id): Product_meta_entity
	{
		$this->meta_id = $meta_id;
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
	public function set_product_id(int $product_id): Product_meta_entity
	{
		$this->product_id = $product_id;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_meta_key(): string
	{
		return $this->meta_key;
	}

	/**
	 * @param	string	$meta_key
	 * @return	$this
	 */
	public function set_meta_key(string $meta_key): Product_meta_entity
	{
		$this->meta_key = $meta_key;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_meta_value(): string
	{
		return $this->meta_value;
	}

	/**
	 * @param	string	$meta_value
	 * @return	$this
	 */
	public function set_meta_value(string $meta_value): Product_meta_entity
	{
		$this->meta_value = $meta_value;
		return $this;
	}
}
