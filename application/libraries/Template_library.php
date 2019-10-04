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
	 * @param 	string	$name
	 * @param 	string	$path
	 * @param 	array	$data
	 * @param 	array	$options
	 */
	public function set(string $name, string $path, array $data = [], array $options = [])
	{
		$this->templates[$name] = $this->CI->load->view(
			$path,
			array_merge($data, $options),
			TRUE
		);
	}

	/**
	 * Prepends a template
	 * If template doesn't exist, it creates one
	 *
	 * @param 	string	$name
	 * @param 	string	$path
	 * @param 	array	$data
	 * @param 	array	$options
	 */
	public function prepend(string $name, string $path, array $data = [], array $options = [])
	{
		$existingTemplate = $this->templates[$name] ?? '';
		$this->set($name, $path, $data, $options);
		$this->templates[$name] = $this->templates[$name] . $existingTemplate;
	}

	/**
	 * Appends a template
	 * If template doesn't exist, it creates one
	 *
	 * @param	string	$name
	 * @param	string	$path
	 * @param	array	$data
	 * @param	array	$options
	 */
	public function append(string $name, string $path, array $data = [], array $options = [])
	{
		$existingTemplate = $this->templates[$name] ?? '';
		$this->set($name, $path, $data, $options);
		$this->templates[$name] = $existingTemplate . $this->templates[$name];
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
	 * Render view with $path containing all $templates
	 *
	 * @param	string	$path
	 * @param	array	$options
	 */
	public function view(string $path, array $options = [])
	{
		$this->CI->load->view(
			$path,
			array_merge($this->templates, $options)
		);
	}
}