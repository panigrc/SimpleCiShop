<?php

class Order_model extends CI_Model {

	public const PAYMENT_TYPE_NONE = 0;

	public const PAYMENT_TYPE_CASH_ON_DELIVERY = 1;

	public const PAYMENT_TYPE_PAYPAL = 2;

	public const PAYMENT_TYPE_BANK_TRANSFER = 3;

	/**
	 * @param string $order_by
	 * @param string $direction ASC, DESC or RANDOM
	 * @return	array
	 */
	public function get_all_orders(string $order_by = 'created', string $direction = 'DESC'): array
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->order_by($order_by, $direction);
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	int $order_id
	 * @return	null|array
	 */
	public function get_order(int $order_id): ?array
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('orders.order_id', $order_id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	int $order_id
	 * @return	array
	 */
	public function get_order_products(int $order_id): array
	{
		$this->db->select('*');
		$this->db->from('order_products');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param int $id
	 * @param array $order_data
	 */
	public function set_order(int $id, array $order_data): void
	{
		$this->db->where('order_id', $id);
		$this->db->update('orders', $this->_process_order_data($order_data));
	}

	/**
	 * @param	int $id
	 * @param	int $status
	 */
	public function set_order_status(int $id, int $status): void
	{
		$this->db->where('order_id', $id);
		$this->db->update('orders', ['status' => $status]);
	}

	/**
	 * @param	array $order_data
	 * @return	int Order Id
	 */
	public function add_order(array $order_data): int
	{
		$this->db->insert('orders', $this->_process_order_data($order_data));

		return $this->db->insert_id();
	}

	/**
	 * Returns an order array ready for insertion or update.
	 *
	 * @param array $order_data
	 * @return array
	 */
	private function _process_order_data(array $order_data): array
	{
		return [
			'user_id' => $order_data['user_id'] ?? NULL,
			'created' => $order_data['created'] ?? time(),
			'status' => $order_data['status'] ?? 0,
			'shipment_express' => $order_data['shipment_express'] ?? FALSE,
			'shipment_to_door' => $order_data['shipment_to_door'] ?? FALSE,
			'shipment_cash_on_delivery' => $order_data['shipment_cash_on_delivery'] ?? self::PAYMENT_TYPE_NONE,
			'price' => $order_data['price'] ?? NULL,
			'coupon_id' => $order_data['coupon_id'] ?? NULL,
			'questionnaire' => false === isset($order_data['questionnaire']) ? NULL : serialize($order_data['questionnaire']),
		];
	}

	/**
	 * @param	int $order_id
	 * @param	array $products
	 */
	public function add_order_products(int $order_id, array $products): void
	{
		foreach ($products as $product_id => $quantity)
		{
			$this->db->insert('order_products', [
				'order_id'   => $order_id,
				'product_id' => $product_id,
				'quantity'   => $quantity,
			]);
		}
	}

	/**
	 * @param	int $order_id
	 */
	public function delete_order(int $order_id): void
	{
		$this->db->delete('orders', ['order_id' => $order_id]);
		$this->db->delete('order_products', ['order_id' => $order_id]);
	}
}
