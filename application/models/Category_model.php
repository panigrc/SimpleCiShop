<?php
/**
 * Class Category_model
 */
class Category_model extends CI_Model {

	/**
	 * Category_model constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get all category_ids
	 *
	 * @param	int	$parent
	 * @return	array
	 */
	public function get_all_category_ids_recursive($parent = 0)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('parent_category_id', $parent);
		$query = $this->db->get();
		$ids = array();
		foreach ($query->result_array() as $row)
		{
			$temp_arr = $this->get_all_category_ids_recursive($row['category_id']);
			$ids[$row['category_id']] = $temp_arr;
			//$ids = $ids + $this->getAllcategory_ids_byID($row['category_id']);
		}
		return $ids;
	}

	/**
	 * Get all children categories of $category_id
	 *
	 * @param	$category_id
	 * @return	array
	 */
	public function get_category_children($category_id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('parent_category_id', $category_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$ids = array();
		//print_r($query->result_array());
		//echo("<br><br>" . time() . "<br><br>");
		foreach ($query->result_array() as $row)
		{
			$temp = $this->get_category_children($row['category_id']);
			//$temp = 0;
			$ids[$row['category_id']] = $temp;
		}
		return $ids;
	}

	/**
	 * Gets all parent categories of $category_id
	 *
	 * @param	$category_id
	 * @return	array
	 */
	public function get_category_parents($category_id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category_id', $category_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$ids = array();
		//print_r($query->result_array());
		//echo("<br><br>" . time() . "<br><br>");
		foreach ($query->result_array() as $row)
		{
			if ($row['parent_category_id'] != 0)
			{
				$temp = $this->get_category_parents($row['parent_category_id']);
				//$temp = 0;
				array_push($temp, $row['parent_category_id']);
				$ids = $temp;
			}
		}
		return $ids;
		/*$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category_id', $category_id);
		$query = $this->db->get();
		$ids = array();
		foreach ($query->result_array() as $row)
		{
		$temp = $this->get_category_parents($row['parent_category_id']);
		if ( ! $this->category_is_root($row['category_id'])) $ids[$row['category_id']] = $temp;
		}
		if (count($ids) > 0) return $ids;
		return NULL;*/
	}

	/**
	 * Checks if $category_id is a root category
	 *
	 * @param	$category_id
	 * @return	bool
	 */
	public function category_is_root($category_id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category_id', $category_id);
		$query = $this->db->get();
		$ids = array();
		$row = $query->row_array();
		return empty($row['parent_category_id']) === TRUE ? TRUE : FALSE ;
	}

	/**
	 * Returns the category with $category_id
	 *
	 * @param	$category_id
	 * @return	mixed
	 */
	public function get_category($category_id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category.category_id', $category_id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * Get root category ID of $category_id
	 *
	 * @param	$category_id
	 * @return	int|null
	 */
	public function get_category_root($category_id)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category_id', $category_id);
		$query = $this->db->get();
		$root_id = 0;
		foreach ($query->result_array() as $row)
		{
			if ($this->category_is_root($row['category_id'])) $root_id = $row['category_id'];
			else $root_id = $this->get_category_root($row['parent_category_id']);
		}
		if ($root_id > 0) return $root_id;
		return NULL;
	}

	/**
	 * Returns an associative array with all category_ids without 1st level
	 * if $nicename is null or not found 0 is returned.
	 *
	 * @param	string|null	$nicename
	 * @return	int
	 */
	public function get_category_id($nicename)
	{
		if (!$nicename)
		{
			return 0;
		}

		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('nicename', $nicename);
		$query = $this->db->get();
		$row = $query->row_array();
		if ($row != NULL)
		{
			return $row['category_id'];
		}

		return 0;
	}

	/**
	 * Returns an associative array with all category_ids without 1st level
	 * If $category_id is 0 then return 'all' for all categories
	 *
	 * @todo	Rename nicename into slug
	 * @todo	make 'all' a constant in global scope
	 * @param	int $category_id
	 * @return	string
	 */
	public function get_category_nicename($category_id)
	{
		if ($category_id === 0)
		{
			return 'all';
		}

		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category_id', $category_id);
		$query = $this->db->get();
		$row = $query->row_array();

		return $row['nicename'];
	}

	/**
	 * @param	$category_id
	 * @return	array
	 */
	public function get_category_text($category_id)
	{
		$this->db->select('*');
		$this->db->from('category_text');
		$this->db->where('category_text.category_id', $category_id);

		$query = $this->db->get();
		$text = array();
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
	 * @param	$category_id
	 * @return	string
	 */
	public function get_category_name($category_id)
	{
		$lang = $this->config->item('language');

		$this->db->select('*');
		$this->db->from('category_text');
		$this->db->where('category_text.category_id', $category_id);
		$this->db->where('category_text.language', $lang);

		$query = $this->db->get();
		$row = $query->row_array();
		if (isset($row['name'])) return $row['name'];
		return "";
	}

	/**
	 * Returns only names in the current language separated by commas
	 *
	 * @param	$category_ids
	 * @return	string
	 */
	public function get_category_names($category_ids)
	{
		$lang = $this->config->item('language');
		$text ="";
		foreach ($category_ids as $category_id)
		{
			$this->db->select('*');
			$this->db->from('category_text');
			$this->db->where('category_text.category_id', $category_id);
			$this->db->where('category_text.language', $lang);

			$query = $this->db->get();
			$row = $query->row_array();
			$text .= $row['name'] . ', ';
		}
		return trim($text, ', ');
	}

	/**
	 * @param	$category_id
	 * @return	mixed
	 */
	public function category_has_info($category_id)
	{
		$lang = $this->config->item('language');

		$this->db->select('COUNT(*) as count');
		$this->db->from('category_text');
		$this->db->where('category_text.category_id', $category_id);
		$this->db->where('category_text.language', $lang);
		$this->db->where('category_text.description NOT LIKE \'\'');

		$query = $this->db->get();
		//echo $this->db->last_query();
		$row = $query->row_array();
		return $row['count'];
	}

	/**
	 *
	 */
	public function set_category()
	{
		$category = array('parent_category_id' => $this->input->post('parent_category_id'), 'nicename' => $this->input->post('nicename'));
		$this->db->where('category_id', $this->input->post('category_id'));
		$this->db->update('category', $category);

		$this->set_category_text();
	}

	/**
	 *
	 */
	public function set_category_text()
	{
		$text_greek = array('name' => $this->input->post('category_name_greek'), 'description' => $this->input->post('category_description_greek'));
		$text_german = array('name' => $this->input->post('category_name_german'), 'description' => $this->input->post('category_description_german'));
		$text_english = array('name' => $this->input->post('category_name_english'), 'description' => $this->input->post('category_description_english'));

		$this->db->where('category_text_id', $this->input->post('category_text_id_greek'));
		$this->db->update('category_text', $text_greek);
		$this->db->where('category_text_id', $this->input->post('category_text_id_german'));
		$this->db->update('category_text', $text_german);
		$this->db->where('category_text_id', $this->input->post('category_text_id_english'));
		$this->db->update('category_text', $text_english);
	}

	/**
	 *
	 */
	public function add_category()
	{
		$parent_category_id = $this->input->post('parent_category_id');
		$nicename = $this->input->post('nicename');
		if ($parent_category_id === NULL) $parent_category_id=0;
		$category = array('parent_category_id' => $parent_category_id, 'nicename' => $nicename);
		$this->db->insert('category', $category);
		$category_id = $this->db->insert_id();
		$this->add_category_text($category_id);
	}

	/**
	 * @param	$category_id
	 */
	public function add_category_text($category_id)
	{
		$text_greek = array('category_id' => $category_id, 'language' => 'greek', 'name' => $this->input->post('category_name_greek'), 'description' => $this->input->post('category_description_greek'));
		$text_german = array('category_id' => $category_id, 'language' => 'german', 'name' => $this->input->post('category_name_german'), 'description' => $this->input->post('category_description_german'));
		$text_english = array('category_id' => $category_id, 'language' => 'english', 'name' => $this->input->post('category_name_english'), 'description' => $this->input->post('category_description_english'));

		$this->db->insert('category_text', $text_greek);
		$this->db->insert('category_text', $text_german);
		$this->db->insert('category_text', $text_english);
	}
}
