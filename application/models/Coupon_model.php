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
		$this->db->from('coupons');

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	$coupon_id
	 * @return	mixed
	 */
	public function get_coupon($coupon_id)
	{
		$this->db->select('*');
		$this->db->from('coupons');
		$this->db->where('coupons.coupon_id', $coupon_id);

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

		$this->db->insert('coupons', $arr);
		$news_id = $this->db->insert_id();
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
	 * @param	$coupon_id
	 */
	public function delete_coupon($coupon_id)
	{
		$this->db->delete('coupons', array('coupon_id' => $coupon_id));
	}
}
