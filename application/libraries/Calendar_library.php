<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_library {

	function __construct($params=NULL)
	{
	}

	function createHTML($input_field, $css_class=NULL, $image_title=NULL)
	{

		$html = '<img src="'.base_url().'assets/jscalendar/img.gif" id="f_trigger_c" title="'.$image_title.'" class="'.$css_class.'" />';
		$html .= '<script type="text/javascript">';
		$html .= 'Calendar.setup({';
		$html .= 'inputField     :    "'.$input_field.'",';
		$html .= 'ifFormat       :    "%d/%m/%Y",';
		$html .= 'button         :    "f_trigger_c",';
		$html .= 'align          :    "Tl",';
		$html .= 'singleClick    :    TRUE';
		$html .= '});';
		$html .= '</script>';
		$html .= '';
		$html .= '';

		return $html;

	}
}
