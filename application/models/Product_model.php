<?php

/**
 * Class	Product_model
 */
class Product_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Returns an associative array with all products
	 *
	 * @return	mixed
	 * @todo	order by as parameter
	 */
	public function get_all_products()
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by("published", "desc");

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Returns an associative array with a single product
	 *
	 * @param $productID
	 * @return mixed
	 */
	public function get_product($productID)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product.productID', $productID);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$productID
	 * @return	array
	 */
	public function get_product_categories($productID)
	{
		$this->db->select('categoryID');
		$this->db->from('product2category');
		$this->db->where('productID', $productID);

		$query = $this->db->get();
		$cats = array();
		foreach ($query->result_array() as $row)
		{
			$cats[] = $row['categoryID'];
		}

		return $cats;
	}

	/**
	 * Returns an associative array with a single product
	 *
	 * @param	$productNicename
	 * @return	mixed
	 * @todo	Rename nicename into slug
	 */
	public function get_product_by_nicename($productNicename)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product.nicename', $productNicename);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$productID
	 * @return	array
	 */
	public function get_product_text($productID)
	{
		$this->db->select('*');
		$this->db->from('product_text');
		$this->db->where('product_text.productID', $productID);

		$query = $this->db->get();
		$text = array();
		foreach ($query->result_array() as $row)
		{
			$text['product_textID_'.$row['language']] = $row['product_textID'];
			$text['title_'.$row['language']] = $row['title'];
			$text['description_'.$row['language']] = $row['description'];
			$text['price_old_'.$row['language']] = $row['price_old'];
			$text['price_'.$row['language']] = $row['price'];
		}

		return $text;
	}

	/**
	 * @param	$productID
	 * @return	array
	 */
	public function get_product_main_image($productID)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.productID', $productID);
		$this->db->where('product_image.main', 1);

		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query->row_array();
		else return array('big' => '', 'thumb' => '');
	}

	/**
	 * @param	$productID
	 * @return	mixed
	 */
	public function get_product_image($productID)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.productID', $productID);

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	$productID
	 * @param	null	$meta
	 * @return	array|null
	 */
	public function get_product_meta($productID, $meta = NULL)
	{
		if ($meta === NULL)
		{
			$this->db->select('*');
			$this->db->from('product_meta');
			$this->db->where('productID', $productID);

			$query = $this->db->get();
			$meta = array();
			foreach ($query->result_array() as $row)
			{
				$meta[$row['meta_key']] = $row['meta_value'];
			}
			return $meta;
		}
		else
		{
			$this->db->select('*');
			$this->db->from('product_meta');
			$this->db->where('productID', $productID);
			$this->db->where('meta_key', $meta);

			$query = $this->db->get();
			$meta = NULL;
			$row = $query->row_array();
			if ($row !=NULL) $meta = $row['meta_value'];
			return $meta;
		}
	}

	/**
	 * Inserts a Product into database.
	 * With it's Categories,
	 * Texts,
	 * Images,
	 * and Metas
	 */
	public function add_product()
	{
		$arr = array('nicename' => $this->input->post('nicename'), 'stock' => $this->input->post('stock'), 'published' => time());

		$this->db->insert('product', $arr);
		$productID = $this->db->insert_id();

		$this->add_product_categories($productID);

		$this->add_product_text($productID);

		$this->add_images($productID);

		$this->add_product_meta($productID);
	}

	/**
	 * Updates a Product.
	 * With it's Categories,
	 * Texts,
	 * Images,
	 * and Metas
	 */
	public function set_product()
	{
		$productID = $this->input->post('productID');
		if (empty($productID)) return;

		$arr = array('nicename' => $this->input->post('nicename'), 'stock' => $this->input->post('stock'));

		$this->db->where('productID', $productID);
		$this->db->update('product', $arr);

		$this->set_product_categories($productID);

		$this->set_product_text($productID);

		$this->set_images();
		$this->add_images($productID);

		$this->set_product_meta($productID);
	}

	/**
	 * Deletes a Product and cleans up
	 * Categories, Texts, Images and Metas
	 * @param	$productID
	 */
	public function delete_product($productID)
	{
		$this->db->delete('product', array('productID' => $productID));

		$this->delete_product_categories($productID);

		$this->db->delete('product_text', array('productID' => $productID));
		$this->db->delete('product_image', array('productID' => $productID));
		$this->delete_images($productID);

		$this->delete_product_meta($productID);
	}

	/**
	 * @param	$productID
	 */
	public function add_product_categories($productID)
	{
		$product_categories = $this->input->post('product_categories');
		foreach ($product_categories as $categoryID)
		{
			$this->db->insert('product2category', array('categoryID' => $categoryID, 'productID' => $productID));
		}
	}

	/**
	 * @param	$productID
	 */
	public function set_product_categories($productID)
	{
		$this->delete_product_categories($productID);
		$this->add_product_categories($productID);
	}

	/**
	 * @param	$productID
	 */
	public function delete_product_categories($productID)
	{
		$this->db->delete('product2category', array('productID' => $productID));
	}

	/**
	 * @todo	loop through languages
	 * @param	$productID
	 */
	function add_product_text($productID)
	{
		$text_greek = array('productID' => $productID, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 'description' => $this->input->post('description_greek'), 'price_old' => $this->input->post('price_old_greek'), 'price' => $this->input->post('price_greek'));
		$text_german = array('productID' => $productID, 'language' => 'german', 'title' => $this->input->post('title_german'), 'description' => $this->input->post('description_german'), 'price_old' => $this->input->post('price_old_german'), 'price' => $this->input->post('price_german'));
		$text_english = array('productID' => $productID, 'language' => 'english', 'title' => $this->input->post('title_english'), 'description' => $this->input->post('description_english'), 'price_old' => $this->input->post('price_old_english'), 'price' => $this->input->post('price_english'));

		$this->db->insert('product_text', $text_greek);
		$this->db->insert('product_text', $text_german);
		$this->db->insert('product_text', $text_english);
	}

	/**
	 * @todo	loop through languages
	 * @param	$productID
	 */
	public function set_product_text($productID) {
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

	public function set_images()
	{
		$arr = explode(",", $this->input->post('images'));
		foreach ($arr as $current)
		{
			if (isset($_POST['delete_image'.$current]))
			{
				$this->db->select('*');
				$this->db->from('product_image');
				$this->db->where('product_image.product_imageID', $current);

				$query = $this->db->get();
				$image = $query->row_array();

				unlink('./'.$image['thumb']);
				unlink('./'.$image['big']);
				$this->db->delete('product_image', array('product_imageID' => $current));
			}
			if (isset($_POST['main_image'.$current]))
			{
				$this->db->where('product_imageID', $current);
				$this->db->update('product_image', array('main' => @$_POST['main_image'.$current]));
			}
		}
	}

	/**
	 * @param	$productID
	 */
	public function add_images($productID)
	{
		$main_image = $this->get_product_main_image($productID);

		for ($i=1; $i<6; $i++)
		{
			if ( ! empty($_FILES['image_file'.$i]['name']) && $this->upload->do_upload('image_file'.$i))
			{
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

				if ($main_image['big'] === "" && $i === 1) $main = 1;
				else $main = 0;

				$arr = array('productID' => $productID, 'title' => $upload_data['raw_name'], 'thumb' => $thumb_name, 'big' => $big_name, 'main' => $main);
				$this->db->insert('product_image', $arr);
			}
			else
			{
				echo $this->upload->display_errors();
			}
		}
	}

	/**
	 * @param	$productID
	 */
	public function delete_images($productID)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.productID', $productID);

		$query = $this->db->get();
		$images = $query->result_array();

		foreach ($images as $image)
		{
			unlink('./'.$image['thumb']);
			unlink('./'.$image['big']);
			$this->db->delete('product_image', array('product_imageID' => $image['product_imageID']));
		}
	}

	/**
	 * @param	$productID
	 */
	public function add_product_meta($productID)
	{
		$product_meta_keys = $this->input->post('product_meta_keys');
		$product_meta_values = $this->input->post('product_meta_values');
		foreach ($product_meta_keys as $num => $key)
		{
			//echo $product_meta_values[$num];
			if ($key && $product_meta_values[$num]) $this->db->insert('product_meta', array('productID' => $productID, 'meta_key' => $key, 'meta_value' => $product_meta_values[$num]));
		}
		//$this->db->insert('product_meta', array('productID' => $productID, 'meta_key' => $this->input->post('product_meta_key_new'), 'meta_value' => $this->input->post('product_meta_value_new')));
	}

	/**
	 * @param	$productID
	 */
	public function set_product_meta($productID)
	{
		$this->delete_product_meta($productID);
		$this->add_product_meta($productID);
	}

	/**
	 * @param	$productID
	 */
	public function delete_product_meta($productID)
	{
		$this->db->delete('product_meta', array('productID' => $productID));
	}

	/**
	 * @param	$productID
	 * @param	$stock
	 * @return	bool
	 */
	public function set_product_stock($productID, $stock)
	{
		if ($productID)
		{
			$this->db->where('productID', $productID);
			//$this->db->update('`product`', array('stock' => $stock));
			$this->db->query('UPDATE product SET stock = stock + ('.$stock.') WHERE productID = '.$productID);
			$product = $this->get_product($productID);

			return $product['stock'];
		}

		return FALSE;
	}
}
