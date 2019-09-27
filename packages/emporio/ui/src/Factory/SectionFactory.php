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

namespace Emporio\Ui\Factory;

use Emporio\Ui\Block\BlockInterface;
use Emporio\Ui\Section\Section;
use Emporio\Ui\Section\SectionInterface;

class SectionFactory
{
	/**
	 * @param string $name
	 * @return SectionInterface
	 */
	public static function create(string $name): SectionInterface
	{
		return new Section($name);
	}

	/**
	 * @param BlockInterface[] $blocks
	 * @return SectionInterface[]
	 */
	public static function createFromBlocks(array $blocks): array
	{
		/** @var SectionInterface[] $sections */
		$sections = [];

		foreach ($blocks as $block) {
			if (! isset($sections[$block->getSectionName()])) {
				$sections[$block->getSectionName()] = static::create($block->getSectionName());
			}

			$sections[$block->getSectionName()]->addBlock($block);
		}

		return $sections;
	}
}
