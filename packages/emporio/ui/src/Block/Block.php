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

namespace Emporio\Ui\Block;

use BadMethodCallException;

class Block implements BlockInterface
{
	/**
	 * @var string $sectionName
	 */
	protected $sectionName;

	/**
	 * @var int $position
	 */
	protected $position;

	/**
	 * @var callable $callback
	 */
	protected $callback;

	/**
	 * Block constructor.
	 *
	 * @param string $sectionName
	 * @param int $position
	 * @param callable $callback
	 */
	public function __construct(string $sectionName, int $position, callable $callback)
	{
		$this->sectionName = $sectionName;
		$this->position = $position;
		$this->callback = $callback;

		$this->validateBlockConfiguration();
	}

	/**
	 * @return string
	 */
	public function getSectionName(): string
	{
		return $this->sectionName;
	}

	/**
	 * @param string $sectionName
	 */
	public function setSectionName(string $sectionName): void
	{
		$this->sectionName = $sectionName;
	}

	/**
	 * @return int
	 */
	public function getPosition(): int
	{
		return $this->position;
	}

	/**
	 * @param int $position
	 */
	public function setPosition(int $position): void
	{
		$this->position = $position;
	}

	/**
	 * @return callable
	 */
	public function getCallback(): callable
	{
		return $this->callback;
	}

	/**
	 * @param callable $callback
	 */
	public function setCallback(callable $callback): void
	{
		$this->callback = $callback;
	}

	/**
	 * @throws	BadMethodCallException
	 */
	private function validateBlockConfiguration(): void
	{
		if (! is_callable($this->callback)) {
			throw new BadMethodCallException(sprintf(
					"Callback [%s] was not found",
					$this->callback
				)
			);
		}
	}
}
