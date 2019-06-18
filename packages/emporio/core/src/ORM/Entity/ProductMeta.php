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

class ProductMeta {
	use GettableSettableTrait;

	/**
	 * @var	int	$id
	 */
	protected $id;

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
	public function get_id(): int
	{
		return $this->id;
	}

	/**
	 * @param	int	$id
	 * @return	$this
	 */
	public function set_id(int $id): ProductMeta
	{
		$this->id = $id;
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
	public function set_product_id(int $product_id): ProductMeta
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
	public function set_meta_key(string $meta_key): ProductMeta
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
	public function set_meta_value(string $meta_value): ProductMeta
	{
		$this->meta_value = $meta_value;
		return $this;
	}
}
