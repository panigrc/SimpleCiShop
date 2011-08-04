<?php

class Coupon extends Controller {

	function Coupon()
	{
		parent::Controller();
		$this->load->helper('url');	
		$this->load->helper('form');
		$this->load->model('Coupon_model');
		$this->lang->load('main');
		$this->db->query("SET NAMES 'utf8'");
		$this->db->query("SET CHARACTER SET utf8");
		$this->db->query("SET NAMES 'utf8'");
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
		
		$coupons = $this->Coupon_model->getAllCoupon();
		$data['contents'] = $this->load->view('coupon/list_tpl', array('coupons' => $coupons), true);
		
		
		$this->load->view('container_tpl',$data);
	}
	
	function view_coupon()
	{
		// displays a coupon form
		$form_data['action'] = $this->uri->segment(3, "add_coupon");
		$data['contents'] = $this->load->view('coupon/coupon_tpl', $form_data, true);

		$data['title'] = "Διαχείριση Συστήματος Προϊόντων";
		$data['heading'] = "Προσθήκη/Προβολή Κουπονιού";
		$this->load->view('container_tpl',$data);
	}
	
	function add_coupon()
	{
		// adds a coupon
		for($i=0; $i<$this->input->post('generation_number'); $i++)
			$this->Coupon_model->addCoupon();
		redirect('coupon');
	}
	
	function delete_coupon()
	{
		// deletes a coupon
		
		$this->Coupon_model->deleteCoupon($this->uri->segment(3));
		redirect('coupon');
	}
}
?>
