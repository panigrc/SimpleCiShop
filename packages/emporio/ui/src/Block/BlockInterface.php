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

interface BlockInterface
{
	/**
	 * @return string
	 */
	public function getSectionName(): string;

	/**
	 * @param string $sectionName
	 */
	public function setSectionName(string $sectionName): void;

	/**
	 * @return int
	 */
	public function getPosition(): int;

	/**
	 * @param int $position
	 */
	public function setPosition(int $position): void;

	/**
	 * @return callable
	 */
	public function getCallback(): callable;

	/**
	 * @param callable $callback
	 */
	public function setCallback(callable $callback): void;
}
