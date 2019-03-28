<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_entity {
	use Getter_setter_trait;

	/**
	 * @var	int	$category_id
	 */
	protected $category_id;

	/**
	 * @var	int	$parent_category_id
	 */
	protected $parent_category_id;

	/**
	 * @var	string	$slug
	 */
	protected $slug;

	/**
	 * @param    int $category_id
	 * @return    $this
	 */
	public function set_category_id($category_id)
	{
		$this->category_id = $category_id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_category_id()
	{
		return $this->category_id;
	}

	/**
	 * @param	int	$parent_category_id
	 * @return	$this
	 */
	public function set_parent_category_id($parent_category_id)
	{
		$this->parent_category_id = $parent_category_id;
		return $this;
	}

	/**
	 * @return	int
	 */
	public function get_parent_category_id()
	{
		return $this->parent_category_id;
	}

	/**
	 * @param	string	$slug
	 * @return	$this
	 */
	public function set_slug($slug)
	{
		$this->slug = $slug;
		return $this;
	}

	/**
	 * @return	string
	 */
	public function get_slug()
	{
		return $this->slug;
	}
}
