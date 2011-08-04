<?php
class Coupon_model extends Model {

	function Coupon_model()
	{
		parent::Model();
	}
	
	function getAllCoupon()
	{
		// returns an associative array with all news
		
		
		$this->db->select('*');
		$this->db->from('coupon');
		
		$query = $this->db->get();
		return $query->result_array();
		
	}
		
	function getCoupon($couponID)
	{
		
		
		$this->db->select('*');
		$this->db->from('coupon');
		$this->db->where('coupon.couponID', $couponID);
		
		$query = $this->db->get();
		return $query->row_array();
		
	}
	
	function addCoupon()
	{
		
		
		$coupon_number = $this->generateCouponNumber();
		if($this->input->post('type') == 1) $coupon_number = $this->input->post('one_time_string') . $coupon_number;
		
		$arr = array('coupon_number' => $coupon_number, 'expires' => $this->input->post('expires'), 'used' => 0, 'discount' => $this->input->post('discount'), 'type' => $this->input->post('type'));
		
		$this->db->insert('coupon', $arr);
		$newsID = $this->db->insert_id();
		
	}
	
	function generateCouponNumber ($length = 4)
	{
	
		// start with a blank password
		$coupon_number = "";
	
		// define possible characters
		$possible = "0123456789"; 
		
		// set up a counter
		$i = 0; 
		
		// add random characters to $password until $length is reached
		while ($i < $length) { 
			
			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			
			// we don't want this character if it's already in the password
			if (!strstr($coupon_number, $char)) { 
				$coupon_number .= $char;
				$i++;
			}
	
		}
	
		// done!
		return $coupon_number;
	
	}
	
	function deleteCoupon($couponID)
	{
		$this->db->delete('coupon', array('couponID' => $couponID));
	}

}
?>
