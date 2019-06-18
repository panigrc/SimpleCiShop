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

class ProductImage {
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
	public function get_id(): int
	{
		return $this->id;
	}

	/**
	 * @param	int	$id
	 * @return	$this
	 */
	public function set_id(int $id): ProductImage
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
	public function set_product_id(int $product_id): ProductImage
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
	public function set_title(string $title): ProductImage
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
	public function set_thumb(string $thumb): ProductImage
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
	public function set_big(string $big): ProductImage
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
	public function set_main(bool $main): ProductImage
	{
		$this->main = $main;
		return $this;
	}
}
