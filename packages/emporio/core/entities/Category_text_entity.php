<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_text_entity {
	use Getter_setter_trait;

	/**
	 * @var	int	$category_text_id
	 */
	private $category_text_id;

	/**
	 * @var	int	$category_id
	 */
	private $category_id;

	/**
	 * @var	string	$language
	 */
	private $language;

	/**
	 * @var	string	$name
	 */
	private $name;

	/**
	 * @var	string	$description
	 */
	private $description;

	/**
	 * @return	int
	 */
	public function get_category_text_id(): int
	{
		return $this->category_text_id;
	}

	/**
	 * @param	int	$category_text_id
	 * @return	$this
	 */
	public function set_category_text_id(int $category_text_id): Category_text_entity
	{
		$this->category_text_id = $category_text_id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_category_id(): int
	{
		return $this->category_id;
	}

	/**
	 * @param	int	$category_id
	 * @return	$this
	 */
	public function set_category_id(int $category_id): Category_text_entity
	{
		$this->category_id = $category_id;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_language(): string
	{
		return $this->language;
	}

	/**
	 * @param	string	$language
	 * @return	$this
	 */
	public function set_language(string $language): Category_text_entity
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_name(): string
	{
		return $this->name;
	}

	/**
	 * @param	string	$name
	 * @return	$this
	 */
	public function set_name(string $name): Category_text_entity
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_description(): string
	{
		return $this->description;
	}

	/**
	 * @param	string	$description
	 * @return	$this
	 */
	public function set_description(string $description): Category_text_entity
	{
		$this->description = $description;
		return $this;
	}
}
