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
		$coupons = $this->coupon_model->get_all_coupon();

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
		for($i=0; $i<$this->input->post('generation_number'); $i++)
		{
			$this->coupon_model->add_coupon();
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
