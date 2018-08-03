<?php
class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($product_nicename = NULL)
	{
		if (empty($product_nicename))
		{
			show_404($page = $_SERVER['PHP_SELF']);
		}

		/**
		 * @todo	create a Product class that handles the following
		 */
		$product = $this->product_model->get_product_by_nicename($product_nicename);
		$product += $this->product_model->get_product_text($product['product_id']);
		$product['category_text'] = $this->category_model->get_category_names($this->product_model->get_product_categories($product['product_id']));
		$product += $this->product_model->get_product_main_image($product['product_id']);

		$content_data = array(
			'nicename' => $product_nicename,
			'product' => $product,
			'images_arr' => $this->product_model->get_product_image($product['product_id']),
			'meta' => $this->product_model->get_product_meta($product['product_id']),
			'lang' => $this->language_library->get_language(),
		);

		$rblock_data = array(
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			"parent" => array(),
			"children" => array(),
			"current" => 0,
		);

		$data = array(
			'pagename' => 'main_slogan',
			'lang' => $this->language_library->get_language(),
			'contents' => $this->load->view('shop/contents/product_tpl', $content_data, TRUE),
			'title' => $product['title_'.$this->language_library->get_language()],
			'rblock' => $this->load->view('shop/blocks/category_block_tpl', $rblock_data, TRUE),
			'scripts' => '<script type="text/javascript" src="'. base_url() .'theme/overlib.js"><!-- overLIB (c) Erik Bosrup --></script>'
		);

		$this->load->view('shop/container', $data);
	}
}
