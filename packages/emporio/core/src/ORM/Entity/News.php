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

class News {
	use GettableSettableTrait;

	/**
	 * @var	int	$id
	 */
	protected $id;

	/**
	 * @var	int	$published
	 */
	protected $published;

	/**
	 * @var	int	$updated
	 */
	protected $updated;

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
	public function set_id(int $id): News
	{
		$this->id = $id;
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
	public function set_published(int $published): News
	{
		$this->published = $published;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_updated(): int
	{
		return $this->updated;
	}

	/**
	 * @param	int	$updated
	 * @return	$this
	 */
	public function set_updated(int $updated): News
	{
		$this->updated = $updated;
		return $this;
	}
}
