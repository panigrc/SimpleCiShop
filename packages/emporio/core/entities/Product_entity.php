<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_entity {
	use Getter_setter_trait;

	/**
	 * @var	int	$product_id
	 */
	protected $product_id;

	/**
	 * @var	string	$slug
	 */
	protected $slug;

	/**
	 * @var	int	$stock
	 */
	protected $stock;

	/**
	 * @var	int	$published
	 */
	protected $published;

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
	public function set_product_id(int $product_id): Product_entity
	{
		$this->product_id = $product_id;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_slug(): string
	{
		return $this->slug;
	}

	/**
	 * @param	string	$slug
	 * @return	$this
	 */
	public function set_slug(string $slug): Product_entity
	{
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_stock(): int
	{
		return $this->stock;
	}

	/**
	 * @param	int	$stock
	 * @return	$this
	 */
	public function set_stock(int $stock): Product_entity
	{
		$this->stock = $stock;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_published(): int
	{
		return $this->published;
	}

	/**
	 * @param	int	$published
	 * @return	$this
	 */
	public function set_published(int $published): Product_entity
	{
		$this->published = $published;
		return $this;
	}
}
