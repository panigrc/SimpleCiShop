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

class News {
	use GettableSettableTrait;

	/**
	 * @var	int	$newsId
	 */
	private $newsId;

	/**
	 * @var	int	$published
	 */
	private $published;

	/**
	 * @var	int	$updated
	 */
	private $updated;

	/**
	 * @return	int
	 */
	public function getNewsId(): int
	{
		return $this->newsId;
	}

	/**
	 * @param	int	$newsId
	 * @return	$this
	 */
	public function setNewsId(int $newsId): News
	{
		$this->newsId = $newsId;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getPublished(): int
	{
		return $this->published;
	}

	/**
	 * @param	int	$published
	 * @return	$this
	 */
	public function setPublished(int $published): News
	{
		$this->published = $published;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function getUpdated(): int
	{
		return $this->updated;
	}

	/**
	 * @param	int	$updated
	 * @return	$this
	 */
	public function setUpdated(int $updated): News
	{
		$this->updated = $updated;
		return $this;
	}
}
