<?php
class Catalog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param	string	$category_slug
	 * @param	int	$current_page
	 */
	public function index($category_slug = NULL, $current_page = NULL)
	{
		$affiliate = $this->uri->segment(6,"");
		if ($affiliate) $this->_set_affiliate($affiliate);

		//$searchData = $this->search_model->getSearchData();

		$category_id = $this->category_model->get_category_id($category_slug);

		$content_data = array(
			'lang' => $this->language_library->get_language(),
			'products' => $this->_get_product_data($category_id, 6, $current_page ?: 0),
			'pagination' => $this->_pagination($category_id),
			'category_text' => $this->category_model->get_category_text($category_id),
		);

		$data['contents'] = '';

		if ($category_id === 0)
		{
			$data['contents'] = $this->load->view('shop/contents/'.$this->language_library->get_language().'/home_tpl', $content_data, TRUE);
		}

		$data['contents'] .= $this->load->view('shop/contents/catalog_tpl', $content_data, TRUE);

		$rblock_data = array(
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			'parent' => $this->category_model->get_category_parents($category_id),
			'children' => $this->category_model->get_category_children($category_id),
			'current' => $category_id
		);

		$data['rblock'] = $this->load->view('shop/blocks/category_block_tpl', $rblock_data, TRUE);
		//$data['rblock'] = $this->load->view('shop/blocks/product_type_num_tpl', array('countryID' => NULL), TRUE);
		//$data['tblock'] = $this->load->view('shop/blocks/search_tpl', array('countryID' => NULL), TRUE);

		$data['pagename'] = 'main_catalog';
		$data['lang'] = $this->language_library->get_language();
		//$data['categoryID'] = $this->search_model->getSearchData();
		//$data['categoryID'] = $searchData['categoryID'];
		$data['categoryID'] = $category_id;
		$data['title'] = $this->category_model->get_category_name($category_id);

		$this->load->view('shop/container', $data);
	}

	/**
	 * @param	int	$current_page
	 * @param	int	$category_id
	 * @param	int	$products_per_page
	 * @return	mixed
	 */
	private function _get_product_data($category_id, $products_per_page = 6, $current_page = 0)
	{
		$products = $this->search_model->search_products_by_category_id($category_id, $products_per_page, $current_page);

		foreach($products as $product => $value) {
			$products[$product] += $this->product_model->get_product_text($products[$product]['productID']);
			$products[$product] += $this->category_model->get_category_text($products[$product]['categoryID']);
			$products[$product] += $this->product_model->get_product_main_image($products[$product]['productID']);
		}
		//print_r($products);

		return $products;
	}

	private function _pagination($category_id, $method = 'index', $products_per_page = 6)
	{
		$config['base_url'] = site_url('shop/catalog/'.$method.'/'.$this->category_model->get_category_nicename($category_id).'/');
		$config['total_rows'] = count($this->search_model->search_products_by_category_id($category_id));
		$config['per_page'] = $products_per_page;
		$config['uri_segment'] = 5;
		$config['num_links'] = 50;
		$config['first_link'] = $this->lang->line('main_page_first');
		$config['last_link'] = $this->lang->line('main_page_last');

		$this->pagination->initialize($config);
		return $this->pagination->create_links();
	}

	function _set_affiliate($affiliate)
	{
		$cart = $this->session->userdata('cart');

		$cart['affiliate'] = (isset($affiliate))? $affiliate:"";
		$this->session->set_userdata(array('cart' => $cart));
	}
}
