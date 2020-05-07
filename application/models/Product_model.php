<?php

class Product_model extends CI_Model {

	/**
	 * Returns an associative array with all products
	 *
	 * @param string $order_by
	 * @param string $direction ASC, DESC or RANDOM
	 * @return array
	 */
	public function get_all_products(string $order_by = 'published', string $direction = 'DESC'): array
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->order_by($order_by, $direction);

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Returns an associative array with a single product
	 *
	 * @param int $id
	 * @return array
	 */
	public function get_product(int $id): array
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('products.product_id', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	int $id
	 * @return	array
	 */
	public function get_product_categories(int $id): array
	{
		$this->db->select('category_id');
		$this->db->from('product_categories');
		$this->db->where('product_id', $id);

		$query = $this->db->get();
		$categories = [];
		foreach ($query->result_array() as $row)
		{
			$categories[] = $row['category_id'];
		}

		return $categories;
	}

	/**
	 * Returns an associative array with a single product
	 *
	 * @param	string $product_slug
	 * @return	array
	 */
	public function get_product_by_slug(string $product_slug): array
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('products.slug', $product_slug);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$id
	 * @return	array
	 */
	public function get_product_text(int $id): array
	{
		$this->db->select('*');
		$this->db->from('product_texts');
		$this->db->where('product_texts.product_id', $id);

		$query = $this->db->get();
		$text = [];
		foreach ($query->result_array() as $row)
		{
			$text['product_text_id_'.$row['language']] = $row['product_text_id'];
			$text['title_'.$row['language']] = $row['title'];
			$text['description_'.$row['language']] = $row['description'];
			$text['price_old_'.$row['language']] = $row['price_old'];
			$text['price_'.$row['language']] = $row['price'];
		}

		return $text;
	}

	/**
	 * @param	int $id
	 * @return	array
	 */
	public function get_product_main_image(int $id): array
	{
		$this->db->select('*');
		$this->db->from('product_images');
		$this->db->where('product_images.product_id', $id);
		$this->db->where('product_images.main', 1);

		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}

		return ['big' => '', 'thumb' => ''];
	}

	/**
	 * @param	int $id
	 * @return	array
	 */
	public function get_product_images(int $id): array
	{
		$this->db->select('*');
		$this->db->from('product_images');
		$this->db->where('product_images.product_id', $id);

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Return all or a single product meta.
	 *
	 * @param	int $id
	 * @param	string|null $meta_key
	 * @return	array|null
	 */
	public function get_product_meta(int $id, ?string $meta_key = NULL): ?array
	{
		$this->db->select('*');
		$this->db->from('product_meta');
		$this->db->where('product_id', $id);

		if ($meta_key === NULL)
		{
			$query = $this->db->get();
			$meta = [];
			foreach ($query->result_array() as $row)
			{
				$meta[$row['meta_key']] = $row['meta_value'];
			}

			return $meta;
		}

		$this->db->where('meta_key', $meta_key);

		$query = $this->db->get();
		$row = $query->row_array();

		if ($row !== NULL)
		{
			$meta[$meta_key] = $row['meta_value'];
		}

		return $meta ?? [];
	}

	/**
	 * @param string $slug
	 * @param int $stock
	 * @param int $published
	 * @return int Product Id
	 */
	public function add_product(string $slug, int $stock, int $published): int
	{
		$arr = [
			'slug'      => $slug,
			'stock'     => $stock,
			'published' => $published,
		];

		$this->db->insert('products', $arr);

		return $this->db->insert_id();
	}

	/**
	 * @param int $id
	 * @param string $slug
	 * @param int $stock
	 */
	public function set_product(int $id, string $slug, int $stock): void
	{
		$this->db->where('product_id', $id);
		$this->db->update('products', [
			'slug'  => $slug,
			'stock' => $stock,
		]);
	}

	/**
	 * Deletes a Product and cleans up
	 * Categories, Texts, Images and Metas
	 * @param	int $id
	 */
	public function delete_product(int $id): void
	{
		$this->db->delete('products', ['product_id' => $id]);

		$this->delete_product_categories($id);

		$this->db->delete('product_texts', ['product_id' => $id]);
		$this->db->delete('product_images', ['product_id' => $id]);
		$this->delete_images($id);

		$this->delete_product_meta($id);
	}

	/**
	 * @param int $id
	 * @param array $product_categories
	 */
	public function add_product_categories(int $id, array $product_categories): void
	{
		foreach ($product_categories as $category_id)
		{
			$this->db->insert('product_categories', ['category_id' => $category_id, 'product_id' => $id]);
		}
	}

	/**
	 * @param int $id
	 * @param array $product_categories
	 */
	public function set_product_categories(int $id, array $product_categories): void
	{
		if (empty($product_categories))
		{
			return;
		}

		$this->delete_product_categories($id);
		$this->add_product_categories($id, $product_categories);
	}

	/**
	 * @param	$id
	 */
	public function delete_product_categories($id): void
	{
		$this->db->delete('product_categories', ['product_id' => $id]);
	}

	/**
	 * @param int $id
	 * @param string $language
	 * @param string $title
	 * @param string $description
	 * @param float $price
	 * @param float $price_old
	 */
	public function add_product_text(int $id,
									 string $language,
									 string $title,
									 string $description,
									 float $price,
									 float $price_old): void
	{
		$this->db->insert('product_texts', [
			'product_id'  => $id,
			'language'    => $language,
			'title'       => $title,
			'description' => $description,
			'price_old'   => $price_old,
			'price'       => $price,
		]);
	}

	/**
	 * @param int $product_text_id
	 * @param string $title
	 * @param string $description
	 * @param float $price
	 * @param float $price_old
	 */
	public function set_product_text(int $product_text_id,
									 string $title,
									 string $description,
									 float $price,
									 float $price_old): void
	{
		$this->db->where('product_text_id', $product_text_id);
		$this->db->update('product_texts', [
			'title'       => $title,
			'description' => $description,
			'price_old'   => $price_old,
			'price'       => $price,
		]);
	}

	/**
	 * @param int $id
	 * @param array $image_actions in form of
	 *    [
	 *        image_id    => ['action' => '1'],
	 *        22            => ['delete' => '1'],
	 *        34            => ['main' => '1'],
	 *    ]
	 */
	public function set_images(int $id, array $image_actions): void
	{
		foreach ($image_actions as $image_id => $actions)
		{
			if (array_key_exists('main', $actions))
			{
				$this->db->where('product_id', $id);
				$this->db->update('product_images', ['main' => 0]);

				$this->db->where('product_image_id', $image_id);
				$this->db->update('product_images', ['main' => 1]);
			}

			if (array_key_exists('delete', $actions))
			{
				$this->db->select('*');
				$this->db->from('product_images');
				$this->db->where('product_images.product_image_id', $image_id);

				$query = $this->db->get();
				$image = $query->row_array();

				unlink('./'.$image['thumb']);
				unlink('./'.$image['big']);
				$this->db->delete('product_images', ['product_image_id' => $image_id]);

				if ((int) $image['main'] === 1)
				{
					$images = $this->get_product_images($id);
					if (FALSE === $image = current($images))
					{
						return;
					}

					$this->db->where('product_image_id', $image['product_image_id']);
					$this->db->update('product_images', ['main' => 1]);
				}
			}
		}
	}

	/**
	 * @param int $id
	 * @param array $image_data
	 */
	public function add_images(int $id, array $image_data): void
	{
		$main_image = $this->get_product_main_image($id);

		$is_main = FALSE;

		if ($main_image['big'] === '') {
			$is_main = TRUE;
		}

		foreach ($image_data as $image)
		{
			$this->db->insert('product_images', [
					'product_id' => $id,
					'title'      => $image['title'],
					'thumb'      => $image['thumbnail_path'],
					'big'        => $image['original_path'],
					'main'       => $is_main,
				]
			);

			$is_main = FALSE;
		}
	}

	/**
	 * @param	int $id
	 */
	public function delete_images(int $id): void
	{
		$this->db->select('*');
		$this->db->from('product_images');
		$this->db->where('product_images.product_id', $id);

		$query = $this->db->get();
		$images = $query->result_array();

		foreach ($images as $image)
		{
			unlink('./'.$image['thumb']);
			unlink('./'.$image['big']);
			$this->db->delete('product_images', ['product_image_id' => $image['product_image_id']]);
		}
	}

	/**
	 * @param int $id
	 * @param array $product_meta_keys
	 * @param array $product_meta_values
	 */
	public function add_product_meta(int $id, array $product_meta_keys, array $product_meta_values): void
	{
		foreach ($product_meta_keys as $num => $key)
		{
			if ($key && $product_meta_values[$num])
			{
				$this->db->insert('product_meta', [
						'product_id' => $id,
						'meta_key'   => $key,
						'meta_value' => $product_meta_values[$num],
					]
				);
			}
		}
	}

	/**
	 * @param int $id
	 * @param array $product_meta_keys
	 * @param array $product_meta_values
	 */
	public function set_product_meta(int $id, array $product_meta_keys, array $product_meta_values): void
	{
		$this->delete_product_meta($id);
		$this->add_product_meta($id, $product_meta_keys, $product_meta_values);
	}

	/**
	 * @param	int $id
	 */
	public function delete_product_meta(int $id): void
	{
		$this->db->delete('product_meta', ['product_id' => $id]);
	}

	/**
	 * @param	int $id
	 * @param	int $stock
	 */
	public function set_product_stock(int $id, int $stock): void
	{
		$this->db->where('product_id', $id);
		$this->db->update('products', ['stock' => $stock]);
	}
}
