<?php

/**
 * Class Coupon_model
 */
class Coupon_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Returns an associative array with all coupons
	 *
	 * @return	mixed
	 */
	public function get_all_coupon()
	{
		$this->db->select('*');
		$this->db->from('coupon');

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	$couponID
	 * @return	mixed
	 */
	public function get_coupon($couponID)
	{
		$this->db->select('*');
		$this->db->from('coupon');
		$this->db->where('coupon.couponID', $couponID);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 *
	 */
	public function add_coupon()
	{
		$coupon_number = $this->generate_coupon_number();
		if ($this->input->post('type') === 1)
		{
			$coupon_number = $this->input->post('one_time_string') . $coupon_number;
		}

		$arr = array(
			'coupon_number' => $coupon_number,
			'expires' => $this->input->post('expires'),
			'used' => 0,
			'discount' => $this->input->post('discount'),
			'type' => $this->input->post('type')
		);

		$this->db->insert('coupon', $arr);
		$newsID = $this->db->insert_id();
	}

	/**
	 * Start with a blank password
	 *
	 * @param	int	$length
	 * @return	string
	 */
	public function generate_coupon_number($length = 4)
	{
		$coupon_number = "";

		/** @var	string	$possible define possible characters*/
		$possible = "0123456789";

		$i = 0;

		/** add random characters to $password until $length is reached */
		while ($i < $length)
		{

			/** @var	string	$char	pick a random character from the possible ones */
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

			/** we don't want this character if it's already in the password */
			if (!strstr($coupon_number, $char))
			{
				$coupon_number .= $char;
				$i++;
			}
		}

		return $coupon_number;
	}

	/**
	 * @param	$couponID
	 */
	public function delete_coupon($couponID)
	{
		$this->db->delete('coupon', array('couponID' => $couponID));
	}
}
