<?php
class Search_model extends Model {
	function Search_model()
	{
		parent::Model();
	}
	
	function getCategories_rec($arr, $level=0) {
		$temp_ids = null;
		foreach($arr as $item => $key){ 
			$temp_ids .= $this->getCategories_rec($key, $level+1);
			$temp_ids .= $item . ", ";
		}
		return $temp_ids;
	}
	
	function searchProducts($categoryID=null, $product_type=null, $price_from=null, $price_to=null, $order_by=null, $limit_num=null, $limit_from=null)
	{
		$lang = $this->config->item('language');
		//if(!empty($categoryID)) $category_childs = $this->Category_model->getCategoryChilds($categoryID);
		if(!empty($categoryID)) $category_childs = $this->Category_model->getAllCategoryIDs_rec($categoryID);
		
		$this->db->select('product.productID, product.nicename, product.published, product2category.categoryID');
		$this->db->from('product, product_text, product2category');
		if(!empty($categoryID)) {
			/*
			$categories = "(product.categoryID = $categoryID";
			foreach($category_childs as $child => $val) {
				$categories .= " OR product.categoryID = $child";
				foreach($val as $subchild => $subval) {
				$categories .= " OR product.categoryID = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_childs = trim($this->getCategories_rec($category_childs), ", ");
			if(!empty($category_childs)) $category_childs = ", " . $category_childs;
			$categories = "(product2category.categoryID IN ($categoryID".$category_childs."))";
			$this->db->where($categories);
		}
		$this->db->where('product.productID = product2category.productID');
		if(!empty($product_type)) $this->db->where('product.product_type', $product_type);
		if(!empty($price_from)) $this->db->where('product_text.price >', $price_from);
		if(!empty($price_to)) $this->db->where('product_text.price <', $price_to);
		$this->db->where('product.stock >', 0);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.productID = product_text.productID');
		switch ($order_by) {
			case "priceasc":
			$this->db->orderby('product_text.price','asc');
			break;
			case "pricedesc":
			$this->db->orderby('product_text.price','desc');
			break;
			case "dateasc":
			$this->db->orderby('product.published','asc');
			break;
			case "datedesc":
			$this->db->orderby('product.published','desc');
			break;
			case 0:
			$this->db->orderby('product.published','desc');
			break;
		}
		if(!is_null($limit_num) && !is_null($limit_from)) $this->db->limit($limit_num, $limit_from);
	
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
	function searchProductsByCategoryID($categoryID=null, $limit_num=null, $limit_from=null) {
		$lang = $this->config->item('language');
		//if(!empty($categoryID)) $category_childs = $this->Category_model->getCategoryChilds($categoryID);
		if(!empty($categoryID)) $category_childs = $this->Category_model->getAllCategoryIDs_rec($categoryID);
		
		$this->db->select('product.productID, product.nicename, product.published, product2category.categoryID');
		$this->db->from('product, product_text, product2category');
		if(!empty($categoryID)) {
			/*
			$categories = "(product.categoryID = $categoryID";
			foreach($category_childs as $child => $val) {
				$categories .= " OR product.categoryID = $child";
				foreach($val as $subchild => $subval) {
				$categories .= " OR product.categoryID = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_childs = trim($this->getCategories_rec($category_childs), ", ");
			if(!empty($category_childs)) $category_childs = ", " . $category_childs;
			$categories = "(product2category.categoryID IN ($categoryID".$category_childs."))";
			$this->db->where($categories);
		}
		$this->db->where('product.productID = product2category.productID');
		if(!empty($product_type)) $this->db->where('product.product_type', $product_type);
		if(!empty($price_from)) $this->db->where('product_text.price >', $price_from);
		if(!empty($price_to)) $this->db->where('product_text.price <', $price_to);
		$this->db->where('product.stock >', 0);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.productID = product_text.productID');
		$this->db->groupby('product.productID');
		$this->db->orderby('product.published','asc');
		if(!is_null($limit_num) && !is_null($limit_from)) $this->db->limit($limit_num, $limit_from);
	
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
	function countSearchProducts($categoryID=null, $product_type=null, $price_from=null, $price_to=null)
	{
		$lang = $this->config->item('language');
		//if(!empty($categoryID)) $category_childs = $this->Category_model->getCategoryChilds($categoryID);
		if(!empty($categoryID)) $category_childs = $this->Category_model->getAllCategoryIDs_rec($categoryID);
		
		$this->db->select('count(product.productID) as count');
		$this->db->from('product, product_text, product2category');
		if(!empty($categoryID)) {
			/*
			$categories = "(product.categoryID = $categoryID";
			foreach($category_childs as $child => $val) {
				$categories .= " OR product.categoryID = $child";
				foreach($val as $subchild => $subval) {
				$categories .= " OR product.categoryID = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_childs = trim($this->getCategories_rec($category_childs), ", ");
			if(!empty($category_childs)) $category_childs = ", " . $category_childs;
			$categories = "(product2category.categoryID IN ($categoryID".$category_childs."))";
			$this->db->where($categories);
			$this->db->where('product.productID = product2category.productID');
		}
		if(!empty($product_type)) $this->db->where('product.product_type', $product_type);
		if(!empty($price_from)) $this->db->where('product_text.price >', $price_from);
		if(!empty($price_to)) $this->db->where('product_text.price <', $price_to);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.productID = product_text.productID');
	
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->row_array();
		return $result['count'];
	}
	
	function getRandomProduct($categoryID=null, $product_type=null, $price_from=null, $price_to=null)
	{
		$lang = $this->config->item('language');
		//if(!empty($categoryID)) $category_childs = $this->Category_model->getCategoryChilds($categoryID);
		if(!empty($categoryID)) $category_childs = $this->Category_model->getAllCategoryIDs_rec($categoryID);
		
		$this->db->select('*');
		$this->db->from('product, product_text');
		if(!empty($categoryID)) {
			/*
			$categories = "(product.categoryID = $categoryID";
			foreach($category_childs as $child => $val) {
				$categories .= " OR product.categoryID = $child";
				foreach($val as $subchild => $subval) {
				$categories .= " OR product.categoryID = $subchild";
				}
			}
			$categories .= ") ";*/
			$category_childs = trim($this->getCategories_rec($category_childs), ", ");
			if(!empty($category_childs)) $category_childs = ", " . $category_childs;
			$categories = "(product.categoryID IN ($categoryID".$category_childs."))";
			$this->db->where($categories);
		}
		if(!empty($product_type)) $this->db->where('product.product_type', $product_type);
		if(!empty($price_from)) $this->db->where('product_text.price >', $price_from);
		if(!empty($price_to)) $this->db->where('product_text.price <', $price_to);
		$this->db->where('product_text.language', $lang);
		$this->db->where('product.productID = product_text.productID');
		$this->db->orderby('rand()');
		$this->db->limit(1);
		
		$query = $this->db->get();
		//echo $this->db->last_query();
		$result = $query->row_array();
		return $result;
	}
	
	function getSearchData2()
	{
		$searchString = $this->uri->segment(4);
		if(empty($searchString)) {
			$data['categoryID'] = $this->input->post('categoryID') == false ? 0 : $this->input->post('categoryID');
			$data['product_type'] = $this->input->post('product_type') == false ? 0 : $this->input->post('product_type');
			$data['price_from'] = $this->input->post('price_from') == false ? 0 : $this->input->post('price_from');
			$data['price_to'] = $this->input->post('price_to') == false ? 0 : $this->input->post('price_to');
			$data['order_by'] = $this->input->post('order_by') == false ? 0 : $this->input->post('order_by');
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
	
	function getCategoriesWithProducts_rec($parent=0)
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
			$this->db->groupby('product.categoryID');
			$query2 = $this->db->get();
			$row2 = $query2->row_array();
			
			if(!empty($row2['categoryID']) || !empty($temp_arr)) $ids[$row['categoryID']] = $temp_arr;
		}
		return $ids;
	}
}
?>