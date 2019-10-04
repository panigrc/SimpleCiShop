<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myfckeditor {

	public function __construct()
	{
	}

	/**
	 * Creates an FckEditor instance
	 * @param array $vars
	 */
	function create_editor($vars) {

		$vars = [
			'name' => $vars['name'] ?? 'fckeditor',
			'toolbar' => $vars['toolbar'] ?? 'Tool',
			'width' => $vars['width'] ?? '600',
			'height' => $vars['height'] ?? '600',
			'value' => $vars['value'] ?? '',
		];

		$CI =& get_instance();
		$CI->load->library('Fckeditor', [$vars['name']]);

		$editor = new fckeditor($vars['name']);
		$editor->BasePath = base_url().'assets/FCKeditor/';
		$editor->ToolbarSet = $vars['toolbar'];
		$editor->Width = $vars['width'];
		$editor->Height = $vars['height'];
		$editor->Value = $vars['value'];

		return $editor->Create();
	}
}
