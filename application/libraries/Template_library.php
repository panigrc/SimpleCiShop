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

	/**
	 * @var	BlockInterface[]	$blocks
	 */
	private $blocks = [];

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->initBlocks();
	}

	/**
	 * @param	BlockInterface	$block
	 */
	public function addBlock(BlockInterface $block)
	{
		$this->blocks[] = $block;
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
		$this->renderBlocks($vars);

		$this->CI->load->view(
			$view,
			array_merge($this->templates, $vars)
		);
	}

	private function initBlocks()
	{
		foreach ($this->CI->config->item('blocks') as $block) {
			$this->blocks[] = BlockFactory::create($block['section'], $block['position'], $block['callback']);
		}
	}

	/**
	 * @param	array	$vars	An associative array of data to be extracted for use in the view
	 * @throws	BadMethodCallException
	 */
	private function renderBlocks(array $vars = [])
	{
		$sections = SectionFactory::createFromBlocks($this->blocks);

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
		if (! isset($this->templates[$sectionName])) {
			$this->templates[$sectionName] = '';
		}

		$this->templates[$sectionName] .= $contents;
	}
}
