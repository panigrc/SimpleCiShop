<?php

class Coupon extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->list_coupon();
	}

	public function list_coupon()
	{
		$coupons = $this->coupon_model->get_all_coupons();

		$data = array(
			'title' => $this->lang->line('main_manage_coupons'),
			'heading' => $this->lang->line('main_coupons'),
			'contents' => $this->load->view('admin/coupon/list_tpl', array('coupons' => $coupons), TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	/**
	 * @param	string	$action
	 */
	public function view_coupon($action = 'add_coupon')
	{
		$form_data = array(
			'action' => $action,
		);

		$data = array(
			'title' => $this->lang->line('main_manage_coupons'),
			'heading' => $this->lang->line('main_view_edit_coupon'),
			'contents' => $this->load->view('admin/coupon/coupon_tpl', $form_data, TRUE),
		);

		$this->load->view('admin/container_tpl', $data);
	}

	public function add_coupon()
	{
		for($i = 0; $i < $this->input->post('amount'); $i++)
		{
			try
			{
				$uuid = $this->input->post('uuid') . random_int(0, 9999);
			} catch (Exception $e)
			{
			}

			$this->coupon_model->add_coupon(
				$uuid ?? $this->input->post('uuid'),
				$this->input->post('type'),
				$this->input->post('discount'),
				$this->input->post('expires')
			);
		}

		redirect('admin/coupon');
	}

	/**
	 * @param	int	$coupon_id
	 */
	public function delete_coupon($coupon_id)
	{
		$this->coupon_model->delete_coupon($coupon_id);
		redirect('admin/coupon');
	}
}
