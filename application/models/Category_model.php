<?php
/**
 * Class Category_model
 */
class Category_model extends CI_Model {

	/**
	 * Category_model constructor.
	 */
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get all categoryIDs
	 *
	 * @param	int	$parent
	 * @return	array
	 */
	function get_all_category_ids_recursive($parent = 0)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('parent_categoryID', $parent);
		$query = $this->db->get();
		$ids = array();
		foreach ($query->result_array() as $row) {
			$temp_arr = $this->get_all_category_ids_recursive($row['categoryID']);
			$ids[$row['categoryID']] = $temp_arr;
			//$ids = $ids + $this->getAllCategoryIDs_byID($row['categoryID']);
		}
		return $ids;
	}

	/**
	 * Get all children categories of $categoryID
	 *
	 * @param	$categoryID
	 * @return	array
	 */
	function get_category_children($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('parent_categoryID', $categoryID);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$ids = array();
		//print_r($query->result_array());
		//echo("<br><br>" . time() . "<br><br>");
		foreach ($query->result_array() as $row) {
			$temp = $this->get_category_children($row['categoryID']);
			//$temp = 0;
			$ids[$row['categoryID']] = $temp;
		}
		return $ids;
	}

	/**
	 * Gets all parent categories of $categoryID
	 *
	 * @param	$categoryID
	 * @return	array
	 */
	function get_category_parents($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('categoryID', $categoryID);
		$query = $this->db->get();
		//echo $this->db->last_query();
		$ids = array();
		//print_r($query->result_array());
		//echo("<br><br>" . time() . "<br><br>");
		foreach ($query->result_array() as $row){
			if($row['parent_categoryID'] != 0) {
				$temp = $this->get_category_parents($row['parent_categoryID']);
				//$temp = 0;
				array_push($temp, $row['parent_categoryID']);
				$ids = $temp;
			}
		}
		return $ids;
		/*$this->db->select('*');
		$this->db->from('category');
		$this->db->where('categoryID', $categoryID);
		$query = $this->db->get();
		$ids = array();
		foreach ($query->result_array() as $row) {
		$temp = $this->get_category_parents($row['parent_categoryID']);
		if( ! $this->category_is_root($row['categoryID'])) $ids[$row['categoryID']] = $temp;
		}
		if(count($ids) > 0) return $ids;
		return NULL;*/
	}

	/**
	 * Checks if $categoryID is a root category
	 *
	 * @param	$categoryID
	 * @return	bool
	 */
	function category_is_root($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('categoryID', $categoryID);
		$query = $this->db->get();
		$ids = array();
		$row = $query->row_array();
		return empty($row['parent_categoryID']) === TRUE ? TRUE : FALSE ;
	}

	/**
	 * Returns the category with $categoryID
	 *
	 * @param	$categoryID
	 * @return	mixed
	 */
	function get_category($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category.categoryID', $categoryID);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * Get root category ID of $categoryID
	 *
	 * @param	$categoryID
	 * @return	int|null
	 */
	function get_category_root($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('categoryID', $categoryID);
		$query = $this->db->get();
		$rootID = 0;
		foreach ($query->result_array() as $row) {
			if($this->category_is_root($row['categoryID'])) $rootID = $row['categoryID'];
			else $rootID = $this->get_category_root($row['parent_categoryID']);
		}
		if($rootID > 0) return $rootID;
		return NULL;
	}

	/**
	 * Returns an associative array with all categoryIDs without 1st level
	 *
	 * @deprecated
	 * @param	$nicename
	 * @return	int
	 */
	function get_category_id($nicename)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('nicename', $nicename);
		$query = $this->db->get();
		$row = $query->row_array();
		if($row!=NULL) return $row['categoryID'];
		return 0;
	}

	/**
	 * Returns an associative array with all categoryIDs without 1st level
	 *
	 * @todo	Rename nicename into slug
	 * @param	$categoryID
	 * @return	int
	 */
	function get_category_nicename($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('categoryID', $categoryID);
		$query = $this->db->get();
		$row = $query->row_array();
		if($categoryID === 0) return 0;
		return $row['nicename'];
	}

	/**
	 * @param	$categoryID
	 * @return	array
	 */
	function get_category_text($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category_text');
		$this->db->where('category_text.categoryID', $categoryID);

		$query = $this->db->get();
		$text = array();
		foreach ($query->result_array() as $row) {
			$text['category_textID_'.$row['language']] = $row['category_textID'];
			$text['category_name_'.$row['language']] = $row['name'];
			$text['category_description_'.$row['language']] = $row['description'];
		}
		return $text;
	}

	/**
	 * Returns only name in the current language
	 *
	 * @param	$categoryID
	 * @return	string
	 */
	function get_category_name($categoryID)
	{
		$lang = $this->config->item('language');

		$this->db->select('*');
		$this->db->from('category_text');
		$this->db->where('category_text.categoryID', $categoryID);
		$this->db->where('category_text.language', $lang);

		$query = $this->db->get();
		$row = $query->row_array();
		if(isset($row['name'])) return $row['name'];
		return "";
	}

	/**
	 * Returns only names in the current language separated by commas
	 *
	 * @param	$categoryIDs
	 * @return	string
	 */
	function get_category_names($categoryIDs)
	{
		$lang = $this->config->item('language');
		$text ="";
		foreach($categoryIDs as $categoryID) {
			$this->db->select('*');
			$this->db->from('category_text');
			$this->db->where('category_text.categoryID', $categoryID);
			$this->db->where('category_text.language', $lang);

			$query = $this->db->get();
			$row = $query->row_array();
			$text .= $row['name'] . ', ';
		}
		return trim($text, ', ');
	}

	/**
	 * @param	$categoryID
	 * @return	mixed
	 */
	function category_has_info($categoryID)
	{
		$lang = $this->config->item('language');

		$this->db->select('COUNT(*) as count');
		$this->db->from('category_text');
		$this->db->where('category_text.categoryID', $categoryID);
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
	function set_category()
	{
		$category = array('parent_categoryID' => $this->input->post('parent_categoryID'), 'nicename' => $this->input->post('nicename'));
		$this->db->where('categoryID', $this->input->post('categoryID'));
		$this->db->update('category', $category);

		$this->set_category_text();
	}

	/**
	 *
	 */
	function set_category_text()
	{
		$text_greek = array('name' => $this->input->post('category_name_greek'), 'description' => $this->input->post('category_description_greek'));
		$text_german = array('name' => $this->input->post('category_name_german'), 'description' => $this->input->post('category_description_german'));
		$text_english = array('name' => $this->input->post('category_name_english'), 'description' => $this->input->post('category_description_english'));

		$this->db->where('category_textID', $this->input->post('category_textID_greek'));
		$this->db->update('category_text', $text_greek);
		$this->db->where('category_textID', $this->input->post('category_textID_german'));
		$this->db->update('category_text', $text_german);
		$this->db->where('category_textID', $this->input->post('category_textID_english'));
		$this->db->update('category_text', $text_english);
	}

	/**
	 *
	 */
	function add_category()
	{
		$parent_categoryID = $this->input->post('parent_categoryID');
		$nicename = $this->input->post('nicename');
		if($parent_categoryID === NULL) $parent_categoryID=0;
		$category = array('parent_categoryID' => $parent_categoryID, 'nicename' => $nicename);
		$this->db->insert('category', $category);
		$categoryID = $this->db->insert_id();
		$this->add_category_text($categoryID);
	}

	/**
	 * @param	$categoryID
	 */
	function add_category_text($categoryID)
	{
		$text_greek = array('categoryID' => $categoryID, 'language' => 'greek', 'name' => $this->input->post('category_name_greek'), 'description' => $this->input->post('category_description_greek'));
		$text_german = array('categoryID' => $categoryID, 'language' => 'german', 'name' => $this->input->post('category_name_german'), 'description' => $this->input->post('category_description_german'));
		$text_english = array('categoryID' => $categoryID, 'language' => 'english', 'name' => $this->input->post('category_name_english'), 'description' => $this->input->post('category_description_english'));

		$this->db->insert('category_text', $text_greek);
		$this->db->insert('category_text', $text_german);
		$this->db->insert('category_text', $text_english);
	}
}
