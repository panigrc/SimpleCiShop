<?php

class Category_model extends CI_Model {

	/**
	 * Get all category_ids for Parent
	 *
	 * @param	int	$parent_id Parent Category Id
	 * @return	array
	 */
	public function get_all_category_ids_recursive(int $parent_id = 0): array
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('parent_category_id', $parent_id);
		$query = $this->db->get();
		$ids = [];
		foreach ($query->result_array() as $row)
		{
			$temp_arr = $this->get_all_category_ids_recursive($row['category_id']);
			$ids[$row['category_id']] = $temp_arr;
		}

		return $ids;
	}

	/**
	 * Gets all parent categories of $id
	 *
	 * @param	int $id Category Id
	 * @return	array
	 */
	public function get_category_parents(int $id): array
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('category_id', $id);
		$query = $this->db->get();
		$ids = [];
		foreach ($query->result_array() as $row)
		{
			if ($row['parent_category_id'] !== 0)
			{
				$temp = $this->get_category_parents($row['parent_category_id']);
				$temp[] = $row['parent_category_id'];
				$ids = $temp;
			}
		}

		return $ids;
	}

	/**
	 * Checks if $id is a root category
	 *
	 * @param	int $id Category Id
	 * @return	bool
	 */
	public function category_is_root(int $id): bool
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('category_id', $id);
		$query = $this->db->get();
		$row = $query->row_array();

		return $row !== NULL && empty($row['parent_category_id']) === TRUE;
	}

	/**
	 * Returns the category with $id
	 *
	 * @param	int $id Category Id
	 * @return	null|array
	 */
	public function get_category(int $id): ?array
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('categories.category_id', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * Get root category ID of $id
	 *
	 * @return	array|null
	 */
	public function get_root_category(): ?int
	{
		$this->db->select('category_id');
		$this->db->from('categories');
		$this->db->where('parent_category_id', 0);
		$query = $this->db->get();
		return $query->row_array()['category_id'] ?? NULL;
	}

	/**
	 * Returns an associative array with all category_ids without 1st level
	 * if $slug is null or not found 0 is returned.
	 *
	 * @param	string|null	$slug
	 * @return	null|int
	 */
	public function get_category_id(string $slug): ?int
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('slug', $slug);
		$query = $this->db->get();
		$row = $query->row_array();
		return $row['category_id'] ?? NULL;
	}

	/**
	 * Returns an associative array with all category_ids without 1st level
	 * If $id is 0 then return 'all' for all categories
	 *
	 * @param	int $id Category Id
	 * @return	null|string
	 * @todo	make 'all' a constant in global scope
	 */
	public function get_category_slug(int $id): ?string
	{
		if ($id === 0)
		{
			return 'all';
		}

		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('category_id', $id);
		$query = $this->db->get();
		$row = $query->row_array();

		return $row['slug'] ?? NULL;
	}

	/**
	 * @param	int $category_id Category Id
	 * @return	array
	 */
	public function get_category_text(int $category_id): array
	{
		$this->db->select('*');
		$this->db->from('category_texts');
		$this->db->where('category_texts.category_id', $category_id);

		$query = $this->db->get();
		$text = [];
		foreach ($query->result_array() as $row)
		{
			$text['category_text_id_'.$row['language']] = $row['category_text_id'];
			$text['category_name_'.$row['language']] = $row['name'];
			$text['category_description_'.$row['language']] = $row['description'];
		}

		return $text;
	}

	/**
	 * Returns only name in the current language
	 *
	 * @param	int $category_id Category Id
	 * @return	string
	 */
	public function get_category_name(int $category_id): string
	{
		$this->db->select('*');
		$this->db->from('category_texts');
		$this->db->where('category_texts.category_id', $category_id);
		$this->db->where('category_texts.language', $this->language_library->get_language());

		$query = $this->db->get();
		$row = $query->row_array();

		return $row['name'] ?? '';
	}

	/**
	 * Returns only names in the current language separated by commas
	 *
	 * @param	array $category_ids Category Ids
	 * @return	string
	 */
	public function get_category_names(array $category_ids): string
	{
		$text = '';

		foreach ($category_ids as $category_id)
		{
			$this->db->select('*');
			$this->db->from('category_texts');
			$this->db->where('category_texts.category_id', $category_id);
			$this->db->where('category_texts.language', $this->language_library->get_language());

			$query = $this->db->get();
			$row = $query->row_array();
			if ($row !== NULL)
			{
				$text .= $row['name'] . ', ';
			}
		}

		return trim($text, ', ');
	}

	/**
	 * @param int $id Category Id
	 * @param string $slug
	 * @param int $parent_id Parent Category Id
	 */
	public function set_category(int $id, string $slug, int $parent_id = 0): void
	{
		$this->db->where('category_id', $id);
		$this->db->update('categories', [
			'slug' => $slug,
			'parent_category_id' => $parent_id,
		]);
	}

	/**
	 * @param int $category_id Category Text Id
	 * @param string $name
	 * @param string|null $description
	 */
	public function set_category_text(int $category_id, string $name, ?string $description = NULL): void
	{
		$this->db->where('category_text_id', $category_id);
		$this->db->update('category_texts', [
			'name' => $name,
			'description' => $description,
		]);
	}

	/**
	 * @param string $slug
	 * @param int $parent_id Parent category Id
	 * @return int Category Id
	 */
	public function add_category(string $slug, int $parent_id = 0): int
	{
		$this->db->insert('categories', ['slug' => $slug, 'parent_category_id' => $parent_id]);

		return $this->db->insert_id();
	}

	/**
	 * @param int $category_id Category Id
	 * @param string $language
	 * @param string $name
	 * @param string|null $description
	 * @return int Category Text Id
	 */
	public function add_category_text(int $category_id, string $language, string $name, ?string $description = NULL): int
	{
		$this->db->insert('category_texts', [
			'category_id' => $category_id,
			'language' => $language,
			'name' => $name,
			'description' => $description
		]);

		return $this->db->insert_id();
	}
}
