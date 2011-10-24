<?php
class Product_model extends Model {
	function Product_model()
	{
		parent::Model();
	}
	
	function getAllProducts()
	{
		// returns an associative array with all products
		
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->orderby('product.productID', "desc");
		
		$query = $this->db->get();
		return $query->result_array();
		
	}
	
	function getProduct($productID)
	{
		// returns an associative array with a product (one)
		
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product.productID', $productID);
		
		$query = $this->db->get();
		return $query->row_array();
		
	}
	
	function getProductCategories($productID)
	{
		$this->db->select('categoryID');
		$this->db->from('product2category');
		$this->db->where('productID', $productID);
		
		$query = $this->db->get();
		$cats = array();
		foreach ($query->result_array() as $row) {
			$cats[] = $row['categoryID'];
		}
		return $cats;
	}
	
	function getProductByNicename($productNicename)
	{
		// returns an associative array with a product (one)
		
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product.nicename', $productNicename);
		
		$query = $this->db->get();
		return $query->row_array();
		
	}
	
	function getProductText($productID)
	{
		$this->db->select('*');
		$this->db->from('product_text');
		$this->db->where('product_text.productID', $productID);
		
		$query = $this->db->get();
		$text = array();
		foreach ($query->result_array() as $row) {
			$text['product_textID_'.$row['language']] = $row['product_textID'];
			$text['title_'.$row['language']] = $row['title'];
			$text['description_'.$row['language']] = $row['description'];
			$text['price_old_'.$row['language']] = $row['price_old'];
			$text['price_'.$row['language']] = $row['price'];
		}
		return $text;
	}
	
	function getProductMainImage($productID)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.productID', $productID);
		$this->db->where('product_image.main', 1);
		
		$query = $this->db->get(); 
		if($query->num_rows() > 0) return $query->row_array();
		else return array('big' => '', 'thumb' => '');
	}
	
	function getProductImage($productID)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.productID', $productID);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getProductMeta($productID, $meta=null)
	{
		if($meta == null) {
			$this->db->select('*');
			$this->db->from('product_meta');
			$this->db->where('productID', $productID);
			
			$query = $this->db->get();
			$meta = array();
			foreach ($query->result_array() as $row) {
				$meta[$row['meta_key']] = $row['meta_value'];
			}
			return $meta;
		}
		else {
			$this->db->select('*');
			$this->db->from('product_meta');
			$this->db->where('productID', $productID);
			$this->db->where('meta_key', $meta);
			
			$query = $this->db->get();
			$meta = null;
			$row = $query->row_array();
			if($row !=null) $meta = $row['meta_value'];
			return $meta;
		}
	}
}
?>
