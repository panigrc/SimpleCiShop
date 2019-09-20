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
	 * @param 	string	$section
	 * @param 	string	$view
	 * @param 	array	$vars
	 */
	public function set(string $section, string $view, array $vars = [])
	{
		$this->templates[$section] = $this->CI->load->view($view, $vars, TRUE);
	}

	/**
	 * Prepends a template
	 * If template doesn't exist, it creates one
	 *
	 * @param	string	$section	The section of the template in which we should prepend to
	 * @param	string	$view	View Name
	 * @param	array	$vars	An associative array of data to be extracted for use in the view
	 */
	public function prepend(string $section, string $view, array $vars = [])
	{
		$existingTemplate = $this->templates[$section] ?? '';
		$this->set($section, $view, $vars);
		$this->templates[$section] = $this->templates[$section] . $existingTemplate;
	}

	/**
	 * Appends a template
	 * If template doesn't exist, it creates one
	 *
	 * @param	string	$section	The section of the template in which we should append to
	 * @param	string	$view	View Name
	 * @param	array	$vars	An associative array of data to be extracted for use in the view
	 */
	public function append(string $section, string $view, array $vars = [])
	{
		$existingTemplate = $this->templates[$section] ?? '';
		$this->set($section, $view, $vars);
		$this->templates[$section] = $existingTemplate . $this->templates[$section];
	}

	/**
	 * Remove a template section.
	 *
	 * @param	string	$section
	 */
	public function remove(string $section)
	{
		unset($this->templates[$section]);
	}

	/**
	 * Check if template section exists.
	 *
	 * @param	string	$section
	 * @return	bool
	 */
	public function has(string $section)
	{
		return isset($this->templates[$section]);
	}

	/**
	 * Render view with $path containing all $templates
	 *
	 * @param	string	$view	View Name
	 * @param	array	$vars	An associative array of data to be extracted for use in the view
	 * @throws	BadMethodCallException
	 */
	public function view(string $view, array $vars = [])
	{
		$this->initBlocks($vars);

		$this->CI->load->view(
			$view,
			array_merge($this->templates, $vars)
		);
	}

	/**
	 * @param	array	$vars	An associative array of data to be extracted for use in the view
	 * @throws	BadMethodCallException
	 */
	private function initBlocks(array $vars = [])
	{
		foreach($this->CI->config->item('blocks') as $block) {

			if (! is_callable($block['callback'])) {
				throw new BadMethodCallException(sprintf(
						"Callback [%s] was not found",
						implode(':', $block['callback'])
					)
				);
			}

			preg_match($block['rule'], $this->CI->url, $matches);
			if (count($matches) > 0) {
				$this->templates[$block['section']] = call_user_func($block['callback'], $this->CI, $vars);
			}
		}
	}
}
