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

namespace Emporio\Ui\Section;

use Emporio\Ui\Block\BlockInterface;

interface SectionInterface
{
	/**
	 * @return string
	 */
	public function getName(): string;

	/**
	 * @param string $name
	 */
	public function setName(string $name): void;

	/**
	 * Adds a Block to the section. If block's position is already used,
	 * block will be added at the end.
	 *
	 * @param BlockInterface $block
	 */
	public function addBlock(BlockInterface $block): void;

	/**
	 * @return BlockInterface[]
	 */
	public function getBlocks(): array;
}
