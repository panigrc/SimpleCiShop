<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

trait Getter_setter_trait {

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
		return call_user_func([$this, "set_$name"]);
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