<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_library {

	/**
	 * @var	CI_Controller	$CI
	 */
	private $CI;

	/**
	 * @var	array	$templates
	 */
	private $templates = [];

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	/**
	 * @param	string	$name
	 * @param	string	$content
	 * @param	array	$options
	 */
	public function add(string $name, string $content, array $options)
	{
		$this->templates[$name] = $this->CI->load->view($name, $content, TRUE);
	}

	/**
	 * @param	string	$name
	 */
	public function remove(string $name)
	{
		unset($this->templates[$name]);
	}

	/**
	 * @param	string	$name
	 * @return	bool
	 */
	public function has(string $name)
	{
		return isset($this->templates[$name]);
	}

	/**
	 * @param	string	$view
	 */
	public function view(string $view)
	{
		$this->CI->load->view($view, $this->templates);
	}
}