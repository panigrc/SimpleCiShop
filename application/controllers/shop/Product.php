<?php

use Emporio\Ui\Factory\BlockFactory;

final class Product extends CI_Controller {

	public function index($product_slug = NULL)
	{
		if (empty($product_slug))
		{
			show_404($page = $_SERVER['PHP_SELF']);
		}

		/**
		 * @todo	create a Product class that handles the following
		 */
		$product = $this->product_model->get_product_by_slug($product_slug);
		$product += $this->product_model->get_product_text($product['product_id']);
		$product['category_text'] = $this->category_model->get_category_names($this->product_model->get_product_categories($product['product_id']));
		$product += $this->product_model->get_product_main_image($product['product_id']);

		$mainBlock = BlockFactory::create('contents', 5, function (CI_Controller $CI, array $vars) {
			return $CI->load->view('shop/contents/product_tpl', $vars, TRUE);
		});

		$this->template_library->addBlock($mainBlock);

		$this->template_library->view(
			'shop/container_tpl',
			[
				'pagename' => 'main_slogan',
				'title' => $product['title_'.$this->language_library->get_language()],
				'slug' => $product_slug,
				'product' => $product,
				'images_arr' => $this->product_model->get_product_image($product['product_id']),
				'meta' => $this->product_model->get_product_meta($product['product_id']),
			]
		);
	}
}
