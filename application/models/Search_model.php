<?php

/**
 * Class	Search_model
 */
class Search_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param	$arr
	 * @param	int	$level
	 * @return	null|string
	 */
	function get_categories_recursive($arr, $level = 0) {
		$temp_ids = NULL;
		foreach($arr as $item => $key){
			$temp_ids .= $this->get_categories_recursive($key, $level+1);
			$temp_ids .= $item . ", ";
		}

		return $temp_ids;
	}

	/**
	 * @param	null|int	$categoryID
	 * @param	null|string	$product_type
	 * @param	null|int	$price_from
	 * @param	null|int	$price_to
	 * @param	null|int	$order_by
	 * @param	null|int	$limit_num
	 * @param	null|int	$limit_from
	 * @return	mixed
	 */
	function search_products($categoryID = NULL, $product_type = NULL, $price_from = NULL, $price_to = NULL, $order_by = NULL, $limit_num = NULL, $limit_from = NULL)
	{
		$lang = $this->config->item('language');
		//if( ! empty($categoryID)) $category_childs = $this->category_model->get_category_children($categoryID);
		if( ! empty($categoryID)) $category_childs = $this->category_model->get_all_category_ids_recursive($categoryID);

		$this->db->select('product.productID, product.nicename, product.published, product2category.categoryID');
		$this->db->from('product, product_text, product2category');
		if( ! empty($categoryID)) {
			/*
			$categories = "(product.categoryID = $categoryID";
			foreach($category_childs as $child => $val) {
				$categories .= " OR product.categoryID = $child";
				foreach($val as $subchild => $subval) {
				$categories .= " OR product.categoryID = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_childs = trim($this->get_categories_recursive($category_childs), ", ");
			if( ! empty($category_childs)) $category_childs = ", " . $category_childs;
			$categories = "(product2category.categoryID IN ($categoryID".$category_childs."))";
			$this->db->where($categories);
		}
		$this->db->where('product.productID = product2category.productID');
		if( ! empty($product_type)) $this->db->where('product.product_type', $product_type);
		if( ! empty($price_from)) $this->db->where('product_text.price >', $price_from);
		if( ! empty($price_to)) $this->db->where('product_text.price <', $price_to);
		$this->db->where('product.stock >', 0);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.productID = product_text.productID');
		switch ($order_by) {
			case "priceasc":
			$this->db->order_by('product_text.price','asc');
			break;
			case "pricedesc":
			$this->db->order_by('product_text.price','desc');
			break;
			case "dateasc":
			$this->db->order_by('product.published','asc');
			break;
			case "datedesc":
			$this->db->order_by('product.published','desc');
			break;
			case 0:
			$this->db->order_by('product.published','desc');
			break;
		}
		if( ! is_NULL($limit_num) && !is_NULL($limit_from)) $this->db->limit($limit_num, $limit_from);

		$query = $this->db->get();
		//echo $this->db->last_query();

		return $query->result_array();
	}

	/**
	 * @param	null|int	$categoryID
	 * @param	null|int	$limit_num
	 * @param	null|int	$limit_from
	 * @return	mixed
	 */
	function search_products_by_category_id($categoryID = NULL, $limit_num = NULL, $limit_from = NULL) {
		$lang = $this->config->item('language');
		//if( ! empty($categoryID)) $category_childs = $this->category_model->get_category_children($categoryID);
		if( ! empty($categoryID)) $category_childs = $this->category_model->get_all_category_ids_recursive($categoryID);

		$this->db->select('product.productID, product.nicename, product.published, product2category.categoryID');
		$this->db->from('product, product_text, product2category');
		if( ! empty($categoryID)) {
			/*
			$categories = "(product.categoryID = $categoryID";
			foreach($category_childs as $child => $val) {
				$categories .= " OR product.categoryID = $child";
				foreach($val as $subchild => $subval) {
				$categories .= " OR product.categoryID = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_childs = trim($this->get_categories_recursive($category_childs), ", ");
			if( ! empty($category_childs)) $category_childs = ", " . $category_childs;
			$categories = "(product2category.categoryID IN ($categoryID".$category_childs."))";
			$this->db->where($categories);
		}
		$this->db->where('product.productID = product2category.productID');
		if( ! empty($product_type)) $this->db->where('product.product_type', $product_type);
		if( ! empty($price_from)) $this->db->where('product_text.price >', $price_from);
		if( ! empty($price_to)) $this->db->where('product_text.price <', $price_to);
		$this->db->where('product.stock >', 0);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.productID = product_text.productID');
		$this->db->group_by('product.productID');
		$this->db->order_by('product.published','asc');
		if( ! is_NULL($limit_num) && !is_NULL($limit_from)) $this->db->limit($limit_num, $limit_from);

		$query = $this->db->get();
		//echo $this->db->last_query();

		return $query->result_array();
	}

	/**
	 * @param	null|int	$categoryID
	 * @param	null|string	$product_type
	 * @param	null|int	$price_from
	 * @param	null|int	$price_to
	 * @return	mixed
	 */
	function count_search_products($categoryID = NULL, $product_type = NULL, $price_from = NULL, $price_to = NULL)
	{
		$lang = $this->config->item('language');
		//if( ! empty($categoryID)) $category_childs = $this->category_model->get_category_children($categoryID);
		if( ! empty($categoryID)) $category_childs = $this->category_model->get_all_category_ids_recursive($categoryID);

		$this->db->select('count(product.productID) as count');
		$this->db->from('product, product_text, product2category');
		if( ! empty($categoryID)) {
			/*
			$categories = "(product.categoryID = $categoryID";
			foreach($category_childs as $child => $val) {
				$categories .= " OR product.categoryID = $child";
				foreach($val as $subchild => $subval) {
				$categories .= " OR product.categoryID = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_childs = trim($this->get_categories_recursive($category_childs), ", ");
			if( ! empty($category_childs)) $category_childs = ", " . $category_childs;
			$categories = "(product2category.categoryID IN ($categoryID".$category_childs."))";
			$this->db->where($categories);
			$this->db->where('product.productID = product2category.productID');
		}
		if( ! empty($product_type)) $this->db->where('product.product_type', $product_type);
		if( ! empty($price_from)) $this->db->where('product_text.price >', $price_from);
		if( ! empty($price_to)) $this->db->where('product_text.price <', $price_to);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.productID = product_text.productID');

		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->row_array();

		return $result['count'];
	}

	/**
	 * @param	null|int	$categoryID
	 * @param	null|string	$product_type
	 * @param	null|int	$price_from
	 * @param	null|int	$price_to
	 * @return	mixed
	 */
	function get_random_product($categoryID = NULL, $product_type = NULL, $price_from = NULL, $price_to = NULL)
	{
		$lang = $this->config->item('language');
		//if( ! empty($categoryID)) $category_childs = $this->category_model->get_category_children($categoryID);
		if( ! empty($categoryID)) $category_childs = $this->category_model->get_all_category_ids_recursive($categoryID);

		$this->db->select('*');
		$this->db->from('product, product_text');
		if( ! empty($categoryID)) {
			/*
			$categories = "(product.categoryID = $categoryID";
			foreach($category_childs as $child => $val) {
				$categories .= " OR product.categoryID = $child";
				foreach($val as $subchild => $subval) {
				$categories .= " OR product.categoryID = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_childs = trim($this->get_categories_recursive($category_childs), ", ");
			if( ! empty($category_childs)) $category_childs = ", " . $category_childs;
			$categories = "(product.categoryID IN ($categoryID".$category_childs."))";
			$this->db->where($categories);
		}
		if( ! empty($product_type)) $this->db->where('product.product_type', $product_type);
		if( ! empty($price_from)) $this->db->where('product_text.price >', $price_from);
		if( ! empty($price_to)) $this->db->where('product_text.price <', $price_to);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.productID = product_text.productID');
		$this->db->order_by('rand()');
		$this->db->limit(1);

		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->row_array();

		return $result;
	}

	/**
	 * @return	mixed
	 * @todo	Remove in future versions
	 */
	function get_search_data2()
	{
		$searchString = $this->uri->segment(4);
		if(empty($searchString)) {
			$data['categoryID'] = $this->input->post('categoryID') === FALSE ? 0 : $this->input->post('categoryID');
			$data['product_type'] = $this->input->post('product_type') === FALSE ? 0 : $this->input->post('product_type');
			$data['price_from'] = $this->input->post('price_from') === FALSE ? 0 : $this->input->post('price_from');
			$data['price_to'] = $this->input->post('price_to') === FALSE ? 0 : $this->input->post('price_to');
			$data['order_by'] = $this->input->post('order_by') === FALSE ? 0 : $this->input->post('order_by');
			$data['searchString'] = implode('_', $data);
		}
		else {
			if(strpos($searchString, '_')) $searchString = explode('_', $searchString);
			else $searchString = array_fill(0, 5, 0);
			$data['categoryID'] = $searchString[0];
			$data['product_type'] = $searchString[1];
			$data['price_from'] = $searchString[2];
			$data['price_to'] = $searchString[3];
			$data['order_by'] = $searchString[4];
			$data['searchString'] = implode('_', $data);
		}

		return $data;
	}

	/**
	 * @param	int	$parent
	 * @return	array
	 */
	function get_categories_with_products_recursive($parent = 0)
	{
		// wich categories exist from products recursive
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('parent_categoryID', $parent);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$ids = array();
		foreach ($query->result_array() as $row) {
			$temp_arr = $this->getCategoriesWithRealties_rec($row['categoryID']);
			$this->db->select('product.categoryID, category.parent_categoryID');
			$this->db->from('category, product');
			$this->db->where('category.categoryID = product.categoryID');
			$this->db->where('product.categoryID', $row['categoryID']);
			$this->db->group_by('product.categoryID');
			$query2 = $this->db->get();
			$row2 = $query2->row_array();

			if( ! empty($row2['categoryID']) OR !empty($temp_arr)) $ids[$row['categoryID']] = $temp_arr;
		}

		return $ids;
	}
}
