<?php

use Emporio\Ui\Factory\BlockFactory;

final class Catalog extends CI_Controller {

	/**
	 * @param	string	$category_slug
	 * @param	int	$current_page
	 */
	public function index($category_slug = NULL, $current_page = NULL)
	{
		/**
		 * @todo	this must be removed in the future
		 */
		$this->_set_affiliate($this->uri->segment(6,""));

		if ($category_slug !== NULL)
		{
			$recursive = FALSE;
			$category_id = $this->category_model->get_category_id($category_slug);
		}
		else
		{
			$recursive = TRUE;
			$category_id = $this->category_model->get_root_category();
		}

		$mainBlock = BlockFactory::create('contents', 5, function (CI_Controller $CI, array $vars) {
			return $CI->load->view('shop/contents/catalog_tpl', $vars, TRUE);
		});

		$this->template_library->addBlock($mainBlock);

		$this->template_library->view(
			'shop/container_tpl',
			[
				'pagename' => 'main_catalog',
				'category_id' => $category_id,
				'title' => $this->category_model->get_category_name($category_id),
				'products' => $this->_get_product_data($category_id, $recursive, 6, $current_page ?: 0),
				'pagination' => $this->_pagination($category_id, $recursive),
			]
		);
	}

	/**
	 * @param int $category_id
	 * @param bool $recursive
	 * @param int $products_per_page
	 * @param int $current_page
	 * @return    mixed
	 */
	private function _get_product_data($category_id, $recursive = TRUE, $products_per_page = 6, $current_page = 0)
	{
		$products = $this->search_model->search_products(
			$this->language_library->get_language(),
			$category_id,
			$recursive,
			$products_per_page,
			$current_page,
			'published'
		);

		foreach ($products as $product => $value)
		{
			$products[$product] += $this->product_model->get_product_text($products[$product]['product_id']);
			$products[$product] += $this->category_model->get_category_text($products[$product]['category_id']);
			$products[$product] += $this->product_model->get_product_main_image($products[$product]['product_id']);
		}

		return $products;
	}

	/**
	 * @param int $category_id
	 * @param bool $recursive
	 * @param string $method
	 * @param int $products_per_page
	 * @return    string
	 */
	private function _pagination($category_id, $recursive = TRUE, $method = 'index', $products_per_page = 6)
	{
		$config = [
			'base_url' => site_url('shop/catalog/'.$method.'/'.$this->category_model->get_category_slug($category_id).'/'),
			'total_rows' => count($this->search_model->search_products($this->language_library->get_language(), $category_id, $recursive)),
			'per_page' => $products_per_page,
			'uri_segment' => 5,
			'num_links' => 50,
			'first_link' => $this->lang->line('main_page_first'),
			'last_link' => $this->lang->line('main_page_last'),
		];
		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}

	/**
	 * @param	string|null	$affiliate
	 */
	private function _set_affiliate($affiliate)
	{
		if (NULL !== $affiliate) {
			$cart = $this->session->userdata('cart');
			$cart['affiliate'] = $affiliate;
			$this->session->set_userdata(['cart' => $cart]);
		}
	}
}
