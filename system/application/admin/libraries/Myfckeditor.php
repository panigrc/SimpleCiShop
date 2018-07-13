<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Myfckeditor {

	function Myfckeditor($params=NULL)
	{
		// Do something with $params

	}

	function create_editor($vars) {
		$CI =& get_instance();
		$CI->load->library('Fckeditor', empty($vars['name']) === TRUE ? "fckeditor" : $vars['name']);

		$editor = new fckeditor(empty($vars['name']) === TRUE ? "fckeditor" : $vars['name']);
		$editor->BasePath = base_url().'assets/FCKeditor/';
		$editor->ToolbarSet = empty($vars['toolbar']) === TRUE ? "Tool" : $vars['toolbar'];
		$editor->Width = empty($vars['width']) === TRUE ? 600 : $vars['width'];
		$editor->Height = empty($vars['height']) === TRUE ? 600 : $vars['height'];
		$editor->Value = empty($vars['value']) === TRUE ? "" : $vars['value'];

		return $editor->Create();
	}
}
