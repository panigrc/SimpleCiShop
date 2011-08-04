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
		// returns an assosiative array with all categoryIDs without 1st level
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
		// deprecated
		// returns an assosiative array with all categoryIDs from the 2nd level
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
	
	function getCategoryChilds($categoryID)
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
			$temp = $this->getCategoryChilds($row['categoryID']);
			//$temp = 0;
			$ids[$row['categoryID']] = $temp;
		}
		return $ids;
	}
	function getCategoryParents($categoryID)
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
					$temp = $this->getCategoryParents($row['parent_categoryID']);
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
		$temp = $this->getCategoryParents($row['parent_categoryID']);
		if(!$this->categoryIsRoot($row['categoryID'])) $ids[$row['categoryID']] = $temp;
		}
		if(count($ids) > 0) return $ids;
		return null;*/
	}
	
	function categoryIsRoot($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('categoryID', $categoryID);
		$query = $this->db->get();
		$ids = array();
		$row = $query->row_array();
		return empty($row['parent_categoryID']) == true ? true : false ;
	}
	
	function getCategoryRoot($categoryID)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('categoryID', $categoryID);
		$query = $this->db->get();
		$rootID = 0;
		foreach ($query->result_array() as $row) {
			if($this->categoryIsRoot($row['categoryID'])) $rootID = $row['categoryID'];
			else $rootID = $this->getCategoryRoot($row['parent_categoryID']);
		}
		if($rootID > 0) return $rootID;
		return null;
	}
	
	/*function getAllCategoryIDs() {
		// returns an assosiative array with all categoryIDs
		$this->db->select('*');
		$this->db->from('category');
		$query = $this->db->get();
		$ids = array();
		foreach ($query->result_array() as $row) {
		if(empty($row['parent_categoryID'])) {
			$ids[$row['categoryID']] = array();
		}
		else {
			array_push($ids[$row['parent_categoryID']], $row['categoryID']);
		}
		}
		return $ids;
	} */
	
	function getCategoryID($nicename)
	{
		/** deprecated **/
		// returns an assosiative array with all categoryIDs without 1st level
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('nicename', $nicename);
		$query = $this->db->get();
		$row = $query->row_array();
		if($row!=null) return $row['categoryID'];
		return 0;
	}
	
	function getCategoryNicename($categoryID)
	{
		// returns an assosiative array with all categoryIDs without 1st level
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('categoryID', $categoryID);
		$query = $this->db->get();
		$row = $query->row_array();
		if($categoryID==0) return 0;
		return $row['nicename'];
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
		if(isset($row['name'])) return $row['name'];
		return "";
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
	
	function categoryHasInfo($categoryID)
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
}
?>
