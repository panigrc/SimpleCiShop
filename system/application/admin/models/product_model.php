<?php
class Product_model extends Model {

	function Product_model() {
		parent::Model();
	}
	
	function getAllProducts()
	{
		// returns an associative array with all products
		
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->orderby("published", "desc");
		
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
	
	function getProductImage($productID)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.productID', $productID);
		
		$query = $this->db->get();
		return $query->result_array();
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
	
	function getProductMeta($productID)
	{
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
	
	function addProduct()
	{
		
		// insert to product
		$arr = array('nicename' => $this->input->post('nicename'), 'stock' => $this->input->post('stock'), 'published' => time());
		
		$this->db->insert('product', $arr);
		$productID = $this->db->insert_id();
		
		// insert to product2category
		$this->addProductCategories($productID);
		
		// insert to product_text
		$this->addProductText($productID);
		
		// insert to product_image
		$this->addImages($productID);
		
		// insert to product_meta
		$this->addProductMeta($productID);
		
	}
	
	function setProduct()
	{
		
		$productID = $this->input->post('productID');
		if(empty($productID)) return;
		
		// update to product
		$arr = array('nicename' => $this->input->post('nicename'), 'stock' => $this->input->post('stock'));
		
		$this->db->where('productID', $productID);
		$this->db->update('product', $arr);
		
		// update to product2category
		$this->setProductCategories($productID);
		
		// update to product_text
		$this->setProductText($productID);
		
		// update to image
		$this->setImages();
		$this->addImages($productID);
		
		// update to product_meta
		$this->setProductMeta($productID);
		
	}
	
	function deleteProduct($productID)
	{
		$this->db->delete('product', array('productID' => $productID));
		
		// delete to product2category
		$this->deleteProductCategories($productID);
		
		$this->db->delete('product_text', array('productID' => $productID));
		$this->db->delete('product_image', array('productID' => $productID));
		$this->deleteImages($productID);
		
		// delete to product_meta
		$this->deleteProductMeta($productID);
	}
	
	
	function addProductCategories($productID)
	{
		$product_categories = $this->input->post('product_categories');
		foreach($product_categories as $categoryID) {
			$this->db->insert('product2category', array('categoryID' => $categoryID, 'productID' => $productID));
		}
	}
	
	function setProductCategories($productID)
	{
		$this->deleteProductCategories($productID);
		$this->addProductCategories($productID);
	}
	
	function deleteProductCategories($productID)
	{
		$this->db->delete('product2category', array('productID' => $productID));
	}
	
	function addProductText($productID)
	{
		$text_greek = array('productID' => $productID, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 'description' => $this->input->post('description_greek'), 'price_old' => $this->input->post('price_old_greek'), 'price' => $this->input->post('price_greek'));
		$text_german = array('productID' => $productID, 'language' => 'german', 'title' => $this->input->post('title_german'), 'description' => $this->input->post('description_german'), 'price_old' => $this->input->post('price_old_german'), 'price' => $this->input->post('price_german'));
		$text_english = array('productID' => $productID, 'language' => 'english', 'title' => $this->input->post('title_english'), 'description' => $this->input->post('description_english'), 'price_old' => $this->input->post('price_old_english'), 'price' => $this->input->post('price_english'));
		
		$this->db->insert('product_text', $text_greek);
		$this->db->insert('product_text', $text_german);
		$this->db->insert('product_text', $text_english);
	}
	
	function setProductText($productID) {
		$text_greek = array('productID' => $productID, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 
			'description' => $this->input->post('description_greek'), 'price_old' => $this->input->post('price_old_greek'), 'price' => $this->input->post('price_greek'));
		$text_german = array('productID' => $productID, 'language' => 'german', 'title' => $this->input->post('title_german'), 
			'description' => $this->input->post('description_german'), 'price_old' => $this->input->post('price_old_german'), 'price' => $this->input->post('price_german'));
		$text_english = array('productID' => $productID, 'language' => 'english', 'title' => $this->input->post('title_english'), 
			'description' => $this->input->post('description_english'), 'price_old' => $this->input->post('price_old_english'), 'price' => $this->input->post('price_english'));                                        
		
		$this->db->where('product_textID', $this->input->post('product_textID_greek'));
		$this->db->update('product_text', $text_greek);
		$this->db->where('product_textID', $this->input->post('product_textID_german'));
		$this->db->update('product_text', $text_german);
		$this->db->where('product_textID', $this->input->post('product_textID_english'));
		$this->db->update('product_text', $text_english);
	}
	
	function setImages()
	{
		$arr = explode(",", $this->input->post('images'));
		foreach($arr as $current) {
			if(isset($_POST['delete_image'.$current])) {
				$this->db->select('*');
				$this->db->from('product_image');
				$this->db->where('product_image.product_imageID', $current);
				
				$query = $this->db->get();
				$image = $query->row_array();
				
				unlink('./'.$image['thumb']);
				unlink('./'.$image['big']);
				$this->db->delete('product_image', array('product_imageID' => $current));
			}
			if(isset($_POST['main_image'.$current])) {
				$this->db->where('product_imageID', $current);
				$this->db->update('product_image', array('main' => @$_POST['main_image'.$current]));
			}
		}
	}
	
	function addImages($productID) {
		
		$main_image = $this->getProductMainImage($productID);
		
		$this->load->library('upload');
		$this->load->library('image_lib');
		
		for($i=1; $i<6; $i++) {
			if(!empty($_FILES['image_file'.$i]['name']) && $this->upload->do_upload('image_file'.$i)) {
				$upload_data = $this->upload->data();
				
				$config['source_image'] = './images/'.$upload_data['file_name'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 200;
				$config['height'] = 500;
		
				$this->image_lib->initialize($config);
		
				$this->image_lib->resize();
				echo $this->image_lib->display_errors();
				
				$time = time().$i;
				$path = $_ENV['DOCUMENT_ROOT']."/";
				//$path = $_SERVER['DOCUMENT_ROOT'] . "/cool_clean_quiet/";
				
				$thumb_name = "images/".$time."_thumb".$upload_data['file_ext'];
				$big_name = "images/".$time.$upload_data['file_ext'];
			
				$state = rename($path.'images/'.$upload_data['raw_name'].'_thumb'.$upload_data['file_ext'], $path.$thumb_name);
				$state = rename($path.'images/'.$upload_data['file_name'], $path.$big_name);
				
				if($main_image['big'] == "" && $i == 1) $main = 1;
				else $main = 0;
				
				$arr = array('productID' => $productID, 'title' => $upload_data['raw_name'], 'thumb' => $thumb_name, 'big' => $big_name, 'main' => $main);
				$this->db->insert('product_image', $arr);
			}
			else {
				echo $this->upload->display_errors();
			}
		}
	}
	
	function deleteImages($productID)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.productID', $productID);
		
		$query = $this->db->get();
		$images = $query->result_array();
		
		foreach($images as $image) {
			unlink('./'.$image['thumb']);
			unlink('./'.$image['big']);
			$this->db->delete('product_image', array('product_imageID' => $image['product_imageID']));
		}
	}
	
	function addProductMeta($productID)
	{
		$product_meta_keys = $this->input->post('product_meta_keys');
		$product_meta_values = $this->input->post('product_meta_values');
		foreach($product_meta_keys as $num => $key) {
			//echo $product_meta_values[$num];
			if($key && $product_meta_values[$num]) $this->db->insert('product_meta', array('productID' => $productID, 'meta_key' => $key, 'meta_value' => $product_meta_values[$num]));
		}
		//$this->db->insert('product_meta', array('productID' => $productID, 'meta_key' => $this->input->post('product_meta_key_new'), 'meta_value' => $this->input->post('product_meta_value_new')));
	}
	
	function setProductMeta($productID)
	{
		$this->deleteProductMeta($productID);
		$this->addProductMeta($productID);
	}
	
	function deleteProductMeta($productID)
	{
		$this->db->delete('product_meta', array('productID' => $productID));
	}

	//  ** For ajax calls only **

	function setProductStock($productID, $stock)
	{
		if($productID) {
			$this->db->where('productID', $productID);
			//$this->db->update('`product`', array('stock' => $stock));
			$this->db->query('UPDATE product SET stock = stock + ('.$stock.') WHERE productID = '.$productID);
			$product = $this->getProduct($productID);
			return $product['stock'];
		}
		return false;

	}
}
?>
