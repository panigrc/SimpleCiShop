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

class Section implements SectionInterface
{
	/**
	 * @var string $name
	 */
	protected $name;

	/** @var BlockInterface[] */
	protected $blocks = [];

	/**
	 * Section constructor.
	 *
	 * @param string $name
	 */
	public function __construct(string $name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * Adds a Block to the section. If block's position is already used,
	 * block will be added at the end.
	 *
	 * @param BlockInterface $block
	 */
	public function addBlock(BlockInterface $block): void
	{
		$position = $block->getPosition();
		if (isset($this->blocks[$position])) {
			$position = null;
		}
		$this->blocks[$position] = $block;
	}

	/**
	 * @return BlockInterface[]
	 */
	public function getBlocks(): array
	{
		return $this->blocks;
	}
}
