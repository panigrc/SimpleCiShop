<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcomeBlock
{
	/**
	 * @param	CI_Controller	$CI
	 * @param	array	$vars
	 * @return	string
	 */
	public static function view($CI, array $vars)
	{
		if (isset($vars['category_id']) && 0 === $vars['category_id']) {
			return $CI->load->view(
				'shop/contents/'.$CI->language_library->get_language().'/home_tpl',
				$vars,
				TRUE
			);
		}

		return '';
	}
}
