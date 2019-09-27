<?php

use Emporio\Ui\Block\BlockInterface;
use Emporio\Ui\Factory\BlockFactory;
use Emporio\Ui\Factory\SectionFactory;

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
	public function setSection(string $section, string $view, array $vars = [])
	{
		$this->templates[$section] = $this->CI->load->view($view, $vars, TRUE);
	}

	/**
	 * Appends a template
	 * If template doesn't exist, it creates one
	 *
	 * @param	string	$section	The section of the template in which we should append to
	 * @param	string	$view	View Name
	 * @param	array	$vars	An associative array of data to be extracted for use in the view
	 */
	public function appendToSection(string $section, string $view, array $vars = [])
	{
		$existingTemplate = $this->templates[$section] ?? '';
		$this->setSection($section, $view, $vars);
		$this->templates[$section] = $existingTemplate . $this->templates[$section];
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
		/** @var BlockInterface[] $blocks */
		$blocks = [];

		foreach ($this->CI->config->item('blocks') as $block) {
			$blocks[] = BlockFactory::create($block['section'], $block['position'], $block['callback']);
		}

		$sections = SectionFactory::createFromBlocks($blocks);

		foreach ($sections as $section) {
			foreach ($section->getBlocks() as $block) {
				$renderedContents = call_user_func($block->getCallback(), $this->CI, $vars);
				$this->addRenderedContents($section->getName(), $renderedContents ?? '');
			}
		}
	}

	/**
	 * Adds rendered view contents to a Template.
	 *
	 * @param string $sectionName
	 * @param string $contents
	 */
	private function addRenderedContents(string $sectionName, string $contents)
	{
		if (! $this->templates[$sectionName]) {
			$this->templates[$sectionName] = '';
		}

		$this->templates[$sectionName] .= $contents;
	}
}
