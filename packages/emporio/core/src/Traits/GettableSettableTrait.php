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

namespace Emporio\Core\Traits;

use BadMethodCallException;

trait GettableSettableTrait {

	/**
	 * @param	string	$name
	 * @param	mixed	$value
	 * @return	mixed
	 */
	public function __set($name, $value)
	{
		if (! is_callable([$this, "set_$name"])) {
			throw new BadMethodCallException('Method '."set_$name".' was not found');
		}
		return call_user_func([$this, "set_$name"], $value);
	}

	/**
	 * @param	string	$name
	 * @return	mixed
	 */
	public function __get($name)
	{
		if (! is_callable([$this, "get_$name"])) {
			throw new BadMethodCallException('Method '."get_$name".' was not found');
		}
		return call_user_func([$this, "get_$name"]);
	}
}