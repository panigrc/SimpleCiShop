<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categoryBlock
{
	/**
	 * @param	CI_Controller	$CI
	 * @param	array	$vars
	 * @return	string
	 */
	public static function view($CI, array $vars)
	{
		if (! isset($vars['category_id'])) {
			$vars['category_id'] = 0;
		}

		return $CI->load->view(
			'shop/blocks/category_block_tpl',
			[
				'categories_arr' => $CI->category_model->get_all_category_ids_recursive(),
				'parent' => $CI->category_model->get_category_parents($vars['category_id']),
				'children' => $CI->category_model->get_all_category_ids_recursive($vars['category_id']),
				'current' => $vars['category_id']
			],
			TRUE
		);
	}
}
