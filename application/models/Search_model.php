<?php

/**
 * Class	Search_model
 */
class Search_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param	$arr
	 * @param	int	$level
	 * @return	null|string
	 */
	public function get_categories_recursive($arr, $level = 0) {
		$temp_ids = NULL;
		foreach ($arr as $item => $key)
		{
			$temp_ids .= $this->get_categories_recursive($key, $level+1);
			$temp_ids .= $item . ", ";
		}

		return $temp_ids;
	}

	/**
	 * @param	null|int	$category_id
	 * @param	null|string	$product_type
	 * @param	null|int	$price_from
	 * @param	null|int	$price_to
	 * @param	null|int	$order_by
	 * @param	null|int	$limit_num
	 * @param	null|int	$limit_from
	 * @return	mixed
	 */
	public function search_products($category_id = NULL, $product_type = NULL, $price_from = NULL, $price_to = NULL, $order_by = NULL, $limit_num = NULL, $limit_from = NULL)
	{
		$lang = $this->config->item('language');
		//if (!empty($category_id)) $category_children = $this->category_model->get_category_children($category_id);
		if (!empty($category_id))
		{
			$category_children = $this->category_model->get_all_category_ids_recursive($category_id);
		}

		$this->db->select('product.product_id, product.slug, product.published, product2category.category_id');
		$this->db->from('product, product_text, product2category');
		if (!empty($category_id))
		{
			/*
			$categories = "(product.category_id = $category_id";
			foreach ($category_children as $child => $val)
			{
				$categories .= " OR product.category_id = $child";
				foreach ($val as $subchild => $subval)
				{
				$categories .= " OR product.category_id = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_children = trim($this->get_categories_recursive($category_children), ", ");
			if (!empty($category_children))
			{
				$category_children = ", " . $category_children;
			}
			$categories = "(product2category.category_id IN ($category_id".$category_children."))";
			$this->db->where($categories);
		}
		$this->db->where('product.product_id = product2category.product_id');
		if (!empty($product_type))
		{
			$this->db->where('product.product_type', $product_type);
		}
		if (!empty($price_from))
		{
			$this->db->where('product_text.price >', $price_from);
		}
		if (!empty($price_to))
		{
			$this->db->where('product_text.price <', $price_to);
		}
		$this->db->where('product.stock >', 0);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.product_id = product_text.product_id');
		
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
		if (!is_NULL($limit_num) && !is_NULL($limit_from))
		{
			$this->db->limit($limit_num, $limit_from);
		}

		$query = $this->db->get();
		//echo $this->db->last_query();

		return $query->result_array();
	}

	/**
	 * @param	null|int	$category_id
	 * @param	null|int	$limit_num
	 * @param	null|int	$limit_from
	 * @return	mixed
	 */
	public function search_products_by_category_id($category_id = NULL, $limit_num = NULL, $limit_from = NULL)
	{
		$lang = $this->config->item('language');
		//if (!empty($category_id)) $category_children = $this->category_model->get_category_children($category_id);
		if (!empty($category_id))
		{
			$category_children = $this->category_model->get_all_category_ids_recursive($category_id);
		}

		$this->db->select('product.product_id, product.slug, product.published, product2category.category_id');
		$this->db->from('product, product_text, product2category');

		if (!empty($category_id))
		{
			/*
			$categories = "(product.category_id = $category_id";
			foreach ($category_children as $child => $val)
			{
				$categories .= " OR product.category_id = $child";
				foreach ($val as $subchild => $subval)
				{
				$categories .= " OR product.category_id = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_children = trim($this->get_categories_recursive($category_children), ", ");

			if (!empty($category_children)) 
			{
				$category_children = ", " . $category_children;
			}
			
			$categories = "(product2category.category_id IN ($category_id".$category_children."))";
			$this->db->where($categories);
		}
		$this->db->where('product.product_id = product2category.product_id');
		if (!empty($product_type)) 
		{
			$this->db->where('product.product_type', $product_type);
		}
		if (!empty($price_from)) 
		{
			$this->db->where('product_text.price >', $price_from);
		}
		if (!empty($price_to)) 
		{
			$this->db->where('product_text.price <', $price_to);
		}
		$this->db->where('product.stock >', 0);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.product_id = product_text.product_id');
		$this->db->group_by('product.product_id');
		$this->db->order_by('product.published','asc');
		if (!is_NULL($limit_num) && !is_NULL($limit_from))
		{
			$this->db->limit($limit_num, $limit_from);
		}

		$query = $this->db->get();
		//echo $this->db->last_query();

		return $query->result_array();
	}

	/**
	 * @param	null|int	$category_id
	 * @param	null|string	$product_type
	 * @param	null|int	$price_from
	 * @param	null|int	$price_to
	 * @return	mixed
	 */
	public function count_search_products($category_id = NULL, $product_type = NULL, $price_from = NULL, $price_to = NULL)
	{
		$lang = $this->config->item('language');
		//if (!empty($category_id)) $category_children = $this->category_model->get_category_children($category_id);
		if (!empty($category_id))
		{
			$category_children = $this->category_model->get_all_category_ids_recursive($category_id);
		}

		$this->db->select('count(product.product_id) as count');
		$this->db->from('product, product_text, product2category');
		if (!empty($category_id))
		{
			/*
			$categories = "(product.category_id = $category_id";
			foreach ($category_children as $child => $val)
			{
				$categories .= " OR product.category_id = $child";
				foreach ($val as $subchild => $subval)
				{
				$categories .= " OR product.category_id = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_children = trim($this->get_categories_recursive($category_children), ", ");

			if (!empty($category_children))
			{
				$category_children = ", " . $category_children;
			}

			$categories = "(product2category.category_id IN ($category_id".$category_children."))";

			$this->db->where($categories);
			$this->db->where('product.product_id = product2category.product_id');
		}

		if (!empty($product_type))
		{
			$this->db->where('product.product_type', $product_type);
		}
		if (!empty($price_from))
		{
			$this->db->where('product_text.price >', $price_from);
		}
		if (!empty($price_to))
		{
			$this->db->where('product_text.price <', $price_to);
		}
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.product_id = product_text.product_id');

		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->row_array();

		return $result['count'];
	}

	/**
	 * @param	null|int	$category_id
	 * @param	null|string	$product_type
	 * @param	null|int	$price_from
	 * @param	null|int	$price_to
	 * @return	mixed
	 */
	public function get_random_product($category_id = NULL, $product_type = NULL, $price_from = NULL, $price_to = NULL)
	{
		$lang = $this->config->item('language');
		//if (!empty($category_id)) $category_children = $this->category_model->get_category_children($category_id);
		if (!empty($category_id))
		{
			$category_children = $this->category_model->get_all_category_ids_recursive($category_id);
		}

		$this->db->select('*');
		$this->db->from('product, product_text');
		if (!empty($category_id))
		{
			/*
			$categories = "(product.category_id = $category_id";
			foreach ($category_children as $child => $val)
			{
				$categories .= " OR product.category_id = $child";
				foreach ($val as $subchild => $subval)
				{
				$categories .= " OR product.category_id = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_children = trim($this->get_categories_recursive($category_children), ", ");

			if (!empty($category_children))
			{
				$category_children = ", " . $category_children;
			}
			$categories = "(product.category_id IN ($category_id".$category_children."))";
			$this->db->where($categories);
		}

		if (!empty($product_type))
		{
			$this->db->where('product.product_type', $product_type);
		}
		if (!empty($price_from))
		{
			$this->db->where('product_text.price >', $price_from);
		}
		if (!empty($price_to))
		{
			$this->db->where('product_text.price <', $price_to);
		}
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.product_id = product_text.product_id');
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
	public function get_search_data2()
	{
		$searchString = $this->uri->segment(4);
		if (empty($searchString))
		{
			$data['category_id'] = $this->input->post('category_id') === FALSE ? 0 : $this->input->post('category_id');
			$data['product_type'] = $this->input->post('product_type') === FALSE ? 0 : $this->input->post('product_type');
			$data['price_from'] = $this->input->post('price_from') === FALSE ? 0 : $this->input->post('price_from');
			$data['price_to'] = $this->input->post('price_to') === FALSE ? 0 : $this->input->post('price_to');
			$data['order_by'] = $this->input->post('order_by') === FALSE ? 0 : $this->input->post('order_by');
			$data['searchString'] = implode('_', $data);
		}
		else
		{
			if (strpos($searchString, '_'))
			{
				$searchString = explode('_', $searchString);
			}
			else
			{
				$searchString = array_fill(0, 5, 0);
			}
			$data['category_id'] = $searchString[0];
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
	public function get_categories_with_products_recursive($parent = 0)
	{
		// which categories exist from products recursive
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('parent_category_id', $parent);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$ids = array();
		
		foreach ($query->result_array() as $row)
		{
			$temp_arr = $this->getCategoriesWithRealties_rec($row['category_id']);
			$this->db->select('product.category_id, category.parent_category_id');
			$this->db->from('category, product');
			$this->db->where('category.category_id = product.category_id');
			$this->db->where('product.category_id', $row['category_id']);
			$this->db->group_by('product.category_id');
			$query2 = $this->db->get();
			$row2 = $query2->row_array();

			if (!empty($row2['category_id']) OR !empty($temp_arr))
			{
				$ids[$row['category_id']] = $temp_arr;
			}
		}

		return $ids;
	}
}
