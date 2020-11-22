<?php

class Catalog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->list_products();
	}

	/**
	 * Gets all products from database
	 */
	public function list_products()
	{
		$products = $this->product_model->get_all_products();

		foreach($products as $product => $value)
		{
			$products[$product] = array_merge($products[$product], $this->product_model->get_product_text($products[$product]['product_id']));
			$products[$product]['category_text'] = $this->category_model->get_category_names($this->product_model->get_product_categories($products[$product]['product_id']));
		}

		$data = array(
			'title' => $this->lang->line('main_manage_products'),
			'heading' => $this->lang->line('main_products'),
			'contents' => $this->load->view('admin/catalog/list_tpl', array('products' => $products), TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	/**
	 * Displays a product form
	 *
	 * @param	string	$action
	 * @param	int	$product_id
	 */
	public function view_product($action = 'add_product', $product_id = null)
	{
		$form_data = array(
			'product_id' => "",
			'slug' => "",
			'published' => "",
			'action' => $action,
			'categories_arr' => $this->category_model->get_all_category_ids_recursive(),
			'product_categories' => array(),
			'all_meta' => $this->meta_model->get_all_meta(),
			'product_meta' => array(),
		);

		if ($action === "edit_product")
		{
			$form_data['product_id'] = $product_id;
			$form_data = array_merge($form_data, $this->product_model->get_product($form_data['product_id']));
			$form_data = array_merge($form_data, $this->product_model->get_product_text($form_data['product_id']));
			$form_data['product_categories'] = $this->product_model->get_product_categories($form_data['product_id']);
			$form_data['product_meta'] = $this->product_model->get_product_meta($form_data['product_id']);
			$form_data['images_arr'] = $this->product_model->get_product_images($form_data['product_id']);
		}

		$data = array(
			'contents' => $this->load->view('admin/catalog/product_tpl', $form_data, TRUE),
			'title' => $this->lang->line('main_manage_products'),
			'heading' => $this->lang->line('main_view_edit_product'),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	public function add_product()
	{
		$product_id = $this->product_model->add_product(
			$this->input->post('slug'),
			$this->input->post('stock'),
			time()
		);

		$this->product_model->add_product_categories($product_id, $this->input->post('product_categories'));

		$this->_process_texts($product_id);

		$this->product_model->add_images($product_id, $this->_upload_multiple_images('new_images'));
		$this->product_model->add_product_meta(
			$product_id,
			$this->input->post('product_meta_keys'),
			$this->input->post('product_meta_values')
		);

		redirect('admin/catalog');
	}

	public function edit_product()
	{
		$product_id = $this->input->post('product_id');

		$this->product_model->set_product(
			$product_id,
			$this->input->post('slug'),
			$this->input->post('stock')
		);
		$this->product_model->set_product_categories($product_id, $this->input->post('product_categories') ?? []);

		$this->_process_texts($product_id);

		if (($images = $this->input->post('images')) !== NULL)
		{
			$this->product_model->set_images($product_id, $images);
		}
		try {
			$this->product_model->add_images($product_id, $this->_upload_multiple_images('new_images'));
		} catch (RuntimeException $e)
		{
			show_error($e->getMessage(), $e->getCode());
		}
		$this->product_model->set_product_meta(
			$product_id,
			$this->input->post('product_meta_keys'),
			$this->input->post('product_meta_values')
		);

		redirect('admin/catalog');
	}

	/**
	 * @param	int	$product_id
	 */
	public function delete_product($product_id)
	{
		$this->product_model->delete_product($product_id);
		redirect('admin/catalog');
	}

	/**
	 * @param	int	$product_id
	 * @param	int	$stock
	 */
	public function set_stock($product_id, $stock)
	{
		$this->product_model->set_product_stock($product_id, $stock);
		redirect('admin/catalog');
	}

	/**
	 * @param string $field
	 * @return array
	 * @throws RuntimeException
	 */
	private function _upload_multiple_images(string $field = 'userfile'): array
	{
		$result = [];

		$upload_config['upload_path']	= './images/';
		$upload_config['allowed_types']	= 'gif|jpg|png';
		$upload_config['max_size']		= '0';
		$upload_config['max_width']		= '0';
		$upload_config['max_height']	= '0';
		$this->upload->initialize($upload_config);

		$image_lib_config['create_thumb'] = TRUE;
		$image_lib_config['maintain_ratio'] = TRUE;
		$image_lib_config['width'] = 200;
		$image_lib_config['height'] = 500;

		$count = count($_FILES[$field]['name'] ?? []);
		$files = $_FILES;
		$upload_data = [];

		for ($i = 0; $i < $count; $i++)
		{
			if ($files[$field]['error'][$i] === UPLOAD_ERR_NO_FILE) {
				continue;
			}

			$_FILES[$field]['name']     = $files[$field]['name'][$i];
			$_FILES[$field]['type']     = $files[$field]['type'][$i];
			$_FILES[$field]['tmp_name'] = $files[$field]['tmp_name'][$i];
			$_FILES[$field]['error']    = $files[$field]['error'][$i];
			$_FILES[$field]['size']     = $files[$field]['size'][$i];

			if (FALSE === $this->upload->do_upload($field))
			{
				throw new RuntimeException($this->upload->display_errors(), 500);
			}

			$upload_data[$i] = $this->upload->data();

			$image_lib_config['source_image'] = './images/'.$upload_data[$i]['file_name'];
			$this->image_lib->initialize($image_lib_config);

			if (FALSE === $this->image_lib->resize())
			{
				throw new RuntimeException($this->image_lib->display_errors(), 500);
			}

			$thumbnail_path = sprintf('images/%s%s_thumb%s', time(), $i, $upload_data[$i]['file_ext']);

			if (FALSE === rename(
					sprintf(
						'./images/%s_thumb%s',
						$upload_data[$i]['raw_name'],
						$upload_data[$i]['file_ext']
					),
					$thumbnail_path
				)
			)
			{
				throw new RuntimeException('Could not rename file ' . $upload_data[$i]['name'], 500);
			}

			$original_path = sprintf('images/%s%s%s', time(), $i, $upload_data[$i]['file_ext']);

			if (FALSE === rename(
					sprintf(
						'./images/%s',
						$upload_data[$i]['file_name']
					),
					$original_path
				)
			)
			{
				throw new RuntimeException('Could not rename file ' . $upload_data[$i]['name'], 500);
			}

			$result[] = [
				'title' => $upload_data[$i]['raw_name'],
				'thumbnail_path' => $thumbnail_path,
				'original_path' => $original_path,
			];
		}

		return $result;
	}

	/**
	 * @param	int	$product_id
	 */
	private function _process_texts(int $product_id)
	{
		foreach ($this->config->item('supported_languages') as $supported_language)
		{
			if (empty($this->input->post("product_text_id_{$supported_language}")))
			{
				$this->product_model->add_product_text(
					$product_id,
					$supported_language,
					$this->input->post("title_{$supported_language}"),
					$this->input->post("description_{$supported_language}"),
					$this->input->post("price_{$supported_language}"),
					$this->input->post("price_old_{$supported_language}")
				);

				continue;
			}

			$this->product_model->set_product_text(
				$this->input->post("product_text_id_{$supported_language}"),
				$this->input->post("title_{$supported_language}"),
				$this->input->post("description_{$supported_language}"),
				$this->input->post("price_{$supported_language}"),
				$this->input->post("price_old_{$supported_language}")
			);
		}
	}
}
