<?php

class Search_model extends CI_Model {

	/**
	 * @param	array $arr
	 * @param	int	$level
	 * @return	null|string
	 */
	public function get_categories_recursive(array $arr, int $level = 0): ?string
	{
		$temp_ids = NULL;
		foreach ($arr as $item => $key)
		{
			$temp_ids .= $this->get_categories_recursive($key, $level+1);
			$temp_ids .= $item . ', ';
		}

		return $temp_ids;
	}

	/**
	 * @param	string		$language
	 * @param	int			$category_id
	 * @param	bool		$recursive
	 * @param	null|int	$limit
	 * @param	null|int	$offset
	 * @param	null|string	$order_by
	 * @param	null|string	$direction ASC, DESC or RANDOM
	 * @param	null|int	$price_from
	 * @param	null|int	$price_to
	 * @return	array
	 */
	public function search_products(string $language,
									int $category_id,
									bool $recursive = FALSE,
									int $limit = NULL,
									int $offset = 0,
									string $order_by = 'price',
									string $direction = 'DESC',
									int $price_from = NULL,
									int $price_to = NULL): array
	{
		$categories_where = "product_categories.category_id = {$category_id}";

		if ($recursive)
		{
			$parent_category_id = $this->category_model->get_category($category_id)['parent_category_id'];

			/* Must run first because it's another query */
			$category_children = $this->category_model->get_all_category_ids_recursive($parent_category_id);
			$category_children = trim($this->get_categories_recursive($category_children), ', ');

			if (FALSE === empty($category_children))
			{
				$category_children = ', ' . $category_children;
			}
			$categories_where = "(product_categories.category_id IN ($category_id".$category_children. '))';
		}

		$this->db->select([
			'products.product_id',
			'products.slug',
			'products.published',
			'product_texts.title',
			'product_texts.title',
			'product_texts.description',
			'product_texts.price',
			'product_texts.price_old',
			'product_categories.category_id'
		]);
		$this->db->from('products, product_texts, product_categories');

		$this->db->where($categories_where);

		$this->db->where('products.product_id = product_categories.product_id');

		if ($price_from !== NULL)
		{
			$this->db->where('product_texts.price >', $price_from);
		}
		if ($price_to !== NULL)
		{
			$this->db->where('product_texts.price <', $price_to);
		}

		$this->db->where('products.stock >', 0);
		$this->db->where('product_texts.language', $language);
		$this->db->where('products.product_id = product_texts.product_id');

		$this->db->order_by($order_by, $direction);

		if ($limit !== NULL)
		{
			$this->db->limit($limit);
		}

		$this->db->offset($offset);

		$this->db->group_by('products.product_id');

		$query = $this->db->get();

		return $query->result_array();
	}
}
