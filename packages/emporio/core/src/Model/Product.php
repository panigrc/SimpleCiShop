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

namespace Emporio\Core\Model;

use Emporio\Core\ORM\Entity\Product as BaseProduct;
use Emporio\Core\ORM\Entity\Category;
use Emporio\Core\ORM\Entity\ProductImage;
use Emporio\Core\ORM\Entity\ProductMeta;
use Emporio\Core\ORM\Entity\ProductText;

class Product extends BaseProduct
{
	/**
	 * @var Category[]
	 */
	protected $categories;

	/**
	 * @var ProductImage[]
	 */
	protected $images;

	/**
	 * @var ProductMeta[]
	 */
	protected $metas;

	/**
	 * @var ProductText[]
	 */
	protected $texts;
}
