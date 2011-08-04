<?php
class Coupon_model extends Model {

	function Coupon_model() {
		parent::Model();
	}
		
	function getCoupon($couponID) {
		
		
		$this->db->select('*');
		$this->db->from('coupon');
		$this->db->where('coupon.couponID', $couponID);
		
		$query = $this->db->get();
		return $query->row_array();
		
	}

}
?>
