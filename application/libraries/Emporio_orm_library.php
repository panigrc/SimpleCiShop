<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Emporio_orm_library
{
	protected $manager = [];

	public function __construct()
	{
		$this->initialize_entity_repositories();
	}

	protected function initialize_entity_repositories()
	{
	}

	/**
	 * @param	string	$manager
	 */
	public function getManager(string $manager)
	{
	}
}
