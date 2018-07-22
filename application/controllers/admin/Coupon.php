<?php

class Coupon extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->list_coupon();
	}

	function list_coupon()
	{
		// gets all products from database
		$data['title'] = "Διαχείριση Συστήματος Ακινήτων";
		$data['heading'] = "Λίστα Κουπονιών";

		$coupons = $this->coupon_model->get_all_coupon();
		$data['contents'] = $this->load->view('coupon/list_tpl', array('coupons' => $coupons), TRUE);


		$this->load->view('container_tpl',$data);
	}

	function view_coupon()
	{
		// displays a coupon form
		$form_data['action'] = $this->uri->segment(3, "add_coupon");
		$data['contents'] = $this->load->view('coupon/coupon_tpl', $form_data, TRUE);

		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Προσθήκη/Προβολή Κουπονιού";
		$this->load->view('container_tpl',$data);
	}

	function add_coupon()
	{
		// adds a coupon
		for($i=0; $i<$this->input->post('generation_number'); $i++)
			$this->coupon_model->add_coupon();
		redirect('coupon');
	}

	function delete_coupon()
	{
		// deletes a coupon

		$this->coupon_model->delete_coupon($this->uri->segment(3));
		redirect('coupon');
	}
}
