<?php
class Coupon_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getCoupon($couponID) {


		$this->db->select('*');
		$this->db->from('coupon');
		$this->db->where('coupon.couponID', $couponID);

		$query = $this->db->get();
		return $query->row_array();

	}

}
