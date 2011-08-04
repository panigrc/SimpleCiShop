<?php
class Category_model extends Model {

	function Category_model()
	{
		parent::Model();
	}
	
	function getAllCategoryIDs_rec($parent=0)
	{
		// returns an assosiative array with all categoryIDs
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('parent_categoryID', $parent); 
		$query = $this->db->get();
		$ids = array();
		foreach ($query->result_array() as $row) {
			$temp_arr = $this->getAllCategoryIDs_rec($row['categoryID']);
			$ids[$row['categoryID']] = $temp_arr;
			//$ids = $ids + $this->getAllCategoryIDs_byID($row['categoryID']);
		}
		return $ids;
	}
	
	function getAllCategoryIDs()
	{
		/** deprecated **/
		// returns an assosiative array with all categoryIDs
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('parent_categoryID', 0);
		$query = $this->db->get();
		$ids = array();
		foreach ($query->result_array() as $row) {
			$ids = $ids + $this->getAllCategoryIDs_byID($row['categoryID']);
		}
		return $ids;
	}
	
	function getAllCategoryIDs_byID($categoryID)
	{
		/** deprecated **/
		// returns an assosiative array with all categoryIDs
		$this->db->select('r1.categoryID as regid1, r1.parent_categoryID as parregid1, r2.categoryID as regid2, r2.parent_categoryID  as parregid2');
		$this->db->from('category as r1');
		$this->db->join('category as r2', 'r2.parent_categoryID = r1.categoryID', 'left');
		$this->db->where('r1.parent_categoryID', $categoryID);
		$query = $this->db->get();
		$ids = array();
		foreach ($query->result_array() as $row) {
			if(empty($row['regid2'])){
				$ids[$row['regid1']] = array();
			}
			else {
				if(!is_array(@$ids[$row['regid1']])) $ids[$row['regid1']] = array();
				array_push($ids[$row['parregid2']], $row['regid2']);
			}
		}
		return $ids;
	}
	
	function getCategory($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category.categoryID', $categoryID);
		
		$query = $this->db->get();
		
		return $query->row_array();
	}
	
	function getCategoryText($categoryID)
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
	
	function getCategoryName($categoryID)
	{
		// returns only name in the current language
		
		$lang = $this->config->item('language');
		
		$this->db->select('*');
		$this->db->from('category_text');
		$this->db->where('category_text.categoryID', $categoryID);
		$this->db->where('category_text.language', $lang);
		
		$query = $this->db->get();
		$row = $query->row_array();
		return $row['name'];
	}
	
	function getCategoryNames($categoryIDs)
	{
		// returns only names in the current language seperated by commas
		
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
	
	function setCategory()
	{
		$category = array('parent_categoryID' => $this->input->post('parent_categoryID'), 'nicename' => $this->input->post('nicename'));
		$this->db->where('categoryID', $this->input->post('categoryID'));
		$this->db->update('category', $category);
		
		$this->setCategoryText();
	}
	
	function setCategoryText()
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
	
	function addCategory()
	{
		$parent_categoryID = $this->input->post('parent_categoryID');
		$nicename = $this->input->post('nicename');
		if($parent_categoryID == null) $parent_categoryID=0;
		$category = array('parent_categoryID' => $parent_categoryID, 'nicename' => $nicename);
		$this->db->insert('category', $category);
		$categoryID = $this->db->insert_id();
		$this->addCategoryText($categoryID);
	}
	
	function addCategoryText($categoryID)
	{
		$text_greek = array('categoryID' => $categoryID, 'language' => 'greek', 'name' => $this->input->post('category_name_greek'), 'description' => $this->input->post('category_description_greek'));
		$text_german = array('categoryID' => $categoryID, 'language' => 'german', 'name' => $this->input->post('category_name_german'), 'description' => $this->input->post('category_description_german'));
		$text_english = array('categoryID' => $categoryID, 'language' => 'english', 'name' => $this->input->post('category_name_english'), 'description' => $this->input->post('category_description_english'));
		
		$this->db->insert('category_text', $text_greek);
		$this->db->insert('category_text', $text_german);
		$this->db->insert('category_text', $text_english);
	}
}
?>
