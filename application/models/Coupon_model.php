<?php

class Coupon_model extends CI_Model {

	public const COUPON_TYPE_SINGLE_USE = 1;

	public const COUPON_TYPE_REUSABLE = 2;

	/**
	 * Returns an associative array with all coupons
	 *
	 * @return	array
	 */
	public function get_all_coupons(): array
	{
		$this->db->select('*');
		$this->db->from('coupons');

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	int		$id
	 * @return	null|array
	 */
	public function get_coupon(int $id): ?array
	{
		$this->db->select('*');
		$this->db->from('coupons');
		$this->db->where('coupons.coupon_id', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	string	$number
	 * @param	int		$type
	 * @param	int		$discount
	 * @param	int		$expires	Timestamp
	 * @return	int	Coupon Id
	 */
	public function add_coupon(string $number, int $type, int $discount, int $expires): int
	{
		$this->db->insert('coupons', [
			'coupon_number' => $number,
			'used' => 0,
			'type' => $type,
			'discount' => $discount,
			'expires' => $expires,
		]);

		return $this->db->insert_id();
	}

	/**
	 * @param	int	$id
	 */
	public function delete_coupon(int $id): void
	{
		$this->db->delete('coupons', ['coupon_id' => $id]);
	}
}
