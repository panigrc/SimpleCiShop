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

use Emporio\Ui\Block\Block;
use Emporio\Ui\Block\BlockInterface;

class BlockFactory
{
	/**
	 * @param string $sectionName
	 * @param int $position
	 * @param callable $callback
	 * @return BlockInterface
	 */
	public static function create(string $sectionName, int $position, callable $callback): BlockInterface
	{
		return new Block($sectionName, $position, $callback);
	}
}
