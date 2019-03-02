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
	 * @param $product_id
	 * @return mixed
	 */
	public function get_product($product_id)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product.product_id', $product_id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$product_id
	 * @return	array
	 */
	public function get_product_categories($product_id)
	{
		$this->db->select('category_id');
		$this->db->from('product2category');
		$this->db->where('product_id', $product_id);

		$query = $this->db->get();
		$cats = array();
		foreach ($query->result_array() as $row)
		{
			$cats[] = $row['category_id'];
		}

		return $cats;
	}

	/**
	 * Returns an associative array with a single product
	 *
	 * @param	$productSlug
	 * @return	mixed
	 */
	public function get_product_by_slug($productSlug)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('product.slug', $productSlug);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$product_id
	 * @return	array
	 */
	public function get_product_text($product_id)
	{
		$this->db->select('*');
		$this->db->from('product_text');
		$this->db->where('product_text.product_id', $product_id);

		$query = $this->db->get();
		$text = array();
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
	 * @param	$product_id
	 * @return	array
	 */
	public function get_product_main_image($product_id)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.product_id', $product_id);
		$this->db->where('product_image.main', 1);

		$query = $this->db->get();
		if ($query->num_rows() > 0) return $query->row_array();
		else return array('big' => '', 'thumb' => '');
	}

	/**
	 * @param	$product_id
	 * @return	mixed
	 */
	public function get_product_image($product_id)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.product_id', $product_id);

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	$product_id
	 * @param	null	$meta
	 * @return	array|null
	 */
	public function get_product_meta($product_id, $meta = NULL)
	{
		if ($meta === NULL)
		{
			$this->db->select('*');
			$this->db->from('product_meta');
			$this->db->where('product_id', $product_id);

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
			$this->db->where('product_id', $product_id);
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
		$arr = array('slug' => $this->input->post('slug'), 'stock' => $this->input->post('stock'), 'published' => time());

		$this->db->insert('product', $arr);
		$product_id = $this->db->insert_id();

		$this->add_product_categories($product_id);

		$this->add_product_text($product_id);

		$this->add_images($product_id);

		$this->add_product_meta($product_id);
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
		$product_id = $this->input->post('product_id');
		if (empty($product_id)) return;

		$arr = array('slug' => $this->input->post('slug'), 'stock' => $this->input->post('stock'));

		$this->db->where('product_id', $product_id);
		$this->db->update('product', $arr);

		$this->set_product_categories($product_id);

		$this->set_product_text($product_id);

		$this->set_images();
		$this->add_images($product_id);

		$this->set_product_meta($product_id);
	}

	/**
	 * Deletes a Product and cleans up
	 * Categories, Texts, Images and Metas
	 * @param	$product_id
	 */
	public function delete_product($product_id)
	{
		$this->db->delete('product', array('product_id' => $product_id));

		$this->delete_product_categories($product_id);

		$this->db->delete('product_text', array('product_id' => $product_id));
		$this->db->delete('product_image', array('product_id' => $product_id));
		$this->delete_images($product_id);

		$this->delete_product_meta($product_id);
	}

	/**
	 * @param	$product_id
	 */
	public function add_product_categories($product_id)
	{
		$product_categories = $this->input->post('product_categories');
		foreach ($product_categories as $category_id)
		{
			$this->db->insert('product2category', array('category_id' => $category_id, 'product_id' => $product_id));
		}
	}

	/**
	 * @param	$product_id
	 */
	public function set_product_categories($product_id)
	{
		$this->delete_product_categories($product_id);
		$this->add_product_categories($product_id);
	}

	/**
	 * @param	$product_id
	 */
	public function delete_product_categories($product_id)
	{
		$this->db->delete('product2category', array('product_id' => $product_id));
	}

	/**
	 * @todo	loop through languages
	 * @param	$product_id
	 */
	function add_product_text($product_id)
	{
		$text_greek = array('product_id' => $product_id, 'language' => 'greek', 'title' => $this->input->post('title_greek'), 'description' => $this->input->post('description_greek'), 'price_old' => $this->input->post('price_old_greek'), 'price' => $this->input->post('price_greek'));
		$text_german = array('product_id' => $product_id, 'language' => 'german', 'title' => $this->input->post('title_german'), 'description' => $this->input->post('description_german'), 'price_old' => $this->input->post('price_old_german'), 'price' => $this->input->post('price_german'));
		$text_english = array('product_id' => $product_id, 'language' => 'english', 'title' => $this->input->post('title_english'), 'description' => $this->input->post('description_english'), 'price_old' => $this->input->post('price_old_english'), 'price' => $this->input->post('price_english'));

		$this->db->insert('product_text', $text_greek);
		$this->db->insert('product_text', $text_german);
		$this->db->insert('product_text', $text_english);
	}

	/**
	 * @todo	loop through languages
	 * @param	$product_id
	 */
	public function set_product_text($product_id) {
		$text_greek = array('product_id' => $product_id, 'language' => 'greek', 'title' => $this->input->post('title_greek'),
			'description' => $this->input->post('description_greek'), 'price_old' => $this->input->post('price_old_greek'), 'price' => $this->input->post('price_greek'));
		$text_german = array('product_id' => $product_id, 'language' => 'german', 'title' => $this->input->post('title_german'),
			'description' => $this->input->post('description_german'), 'price_old' => $this->input->post('price_old_german'), 'price' => $this->input->post('price_german'));
		$text_english = array('product_id' => $product_id, 'language' => 'english', 'title' => $this->input->post('title_english'),
			'description' => $this->input->post('description_english'), 'price_old' => $this->input->post('price_old_english'), 'price' => $this->input->post('price_english'));

		$this->db->where('product_text_id', $this->input->post('product_text_id_greek'));
		$this->db->update('product_text', $text_greek);
		$this->db->where('product_text_id', $this->input->post('product_text_id_german'));
		$this->db->update('product_text', $text_german);
		$this->db->where('product_text_id', $this->input->post('product_text_id_english'));
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
				$this->db->where('product_image.product_image_id', $current);

				$query = $this->db->get();
				$image = $query->row_array();

				unlink('./'.$image['thumb']);
				unlink('./'.$image['big']);
				$this->db->delete('product_image', array('product_image_id' => $current));
			}
			if (isset($_POST['main_image'.$current]))
			{
				$this->db->where('product_image_id', $current);
				$this->db->update('product_image', array('main' => @$_POST['main_image'.$current]));
			}
		}
	}

	/**
	 * @param	$product_id
	 */
	public function add_images($product_id)
	{
		$main_image = $this->get_product_main_image($product_id);

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

				$arr = array('product_id' => $product_id, 'title' => $upload_data['raw_name'], 'thumb' => $thumb_name, 'big' => $big_name, 'main' => $main);
				$this->db->insert('product_image', $arr);
			}
			else
			{
				echo $this->upload->display_errors();
			}
		}
	}

	/**
	 * @param	$product_id
	 */
	public function delete_images($product_id)
	{
		$this->db->select('*');
		$this->db->from('product_image');
		$this->db->where('product_image.product_id', $product_id);

		$query = $this->db->get();
		$images = $query->result_array();

		foreach ($images as $image)
		{
			unlink('./'.$image['thumb']);
			unlink('./'.$image['big']);
			$this->db->delete('product_image', array('product_image_id' => $image['product_image_id']));
		}
	}

	/**
	 * @param	$product_id
	 */
	public function add_product_meta($product_id)
	{
		$product_meta_keys = $this->input->post('product_meta_keys');
		$product_meta_values = $this->input->post('product_meta_values');
		foreach ($product_meta_keys as $num => $key)
		{
			//echo $product_meta_values[$num];
			if ($key && $product_meta_values[$num]) $this->db->insert('product_meta', array('product_id' => $product_id, 'meta_key' => $key, 'meta_value' => $product_meta_values[$num]));
		}
		//$this->db->insert('product_meta', array('product_id' => $product_id, 'meta_key' => $this->input->post('product_meta_key_new'), 'meta_value' => $this->input->post('product_meta_value_new')));
	}

	/**
	 * @param	$product_id
	 */
	public function set_product_meta($product_id)
	{
		$this->delete_product_meta($product_id);
		$this->add_product_meta($product_id);
	}

	/**
	 * @param	$product_id
	 */
	public function delete_product_meta($product_id)
	{
		$this->db->delete('product_meta', array('product_id' => $product_id));
	}

	/**
	 * @param	$product_id
	 * @param	$stock
	 * @return	bool
	 */
	public function set_product_stock($product_id, $stock)
	{
		if ($product_id)
		{
			$this->db->where('product_id', $product_id);
			//$this->db->update('`product`', array('stock' => $stock));
			$this->db->query('UPDATE product SET stock = stock + ('.$stock.') WHERE product_id = '.$product_id);
			$product = $this->get_product($product_id);

			return $product['stock'];
		}

		return FALSE;
	}
}
