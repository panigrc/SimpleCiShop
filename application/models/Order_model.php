<?php

/**
 * Class Order_model
 */
class Order_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Returns an associative array with all order_ids
	 *
	 * @return	mixed
	 * @todo	order by as parameter
	 */
	public function get_all_order_ids()
	{
		$this->db->select('*');
		$this->db->from('`order`');
		$this->db->order_by('date_created','desc');
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	$order_id
	 * @return	mixed
	 */
	public function get_order($order_id)
	{
		$this->db->select('*');
		$this->db->from('`order`');
		$this->db->where('order.order_id', $order_id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$order_id
	 * @return	mixed
	 */
	public function get_order_products($order_id)
	{
		$this->db->select('*');
		$this->db->from('order2product');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function set_order()
	{
		if ( ! $this->input->post('order_code')) {
			$order_code = $this->generate_password();
		}

		$order = array(
			'order_code' => $order_code,
			'order_name' => $this->input->post('order_name'),
			'order_surname' => $this->input->post('order_surname'),
			'order_email' => $this->input->post('order_email'),
			'order_url' => $this->input->post('order_url'),
			'order_birthdate' => $this->input->post('order_birthdate'),
			'order_address' => $this->input->post('order_address'),
			'order_zip' => $this->input->post('order_zip'),
			'order_country' => $this->input->post('order_country'),
			'order_phone' => $this->input->post('order_phone'),
			'order_language' => $this->input->post('order_language'),
			'order_stars' => $this->input->post('order_stars')
		);
		$this->db->where('order_id', $this->input->post('order_id'));
		$this->db->update('order', $order);
	}

	/**
	 * @param	$order_id
	 * @param	$status
	 * @return	bool
	 */
	public function set_order_status($order_id, $status)
	{
		if ($order_id)
		{
			$this->db->where('order_id', $order_id);
			$this->db->update('`order`', array('status' => $status));

			return $status;
		}

		return FALSE;
	}

	/**
	 * @param	$user_id
	 * @return	mixed
	 */
	public function add_order($user_id)
	{
		$shipment_express = 0 + @$this->input->post('shipment_express');
		$shipment_to_door = 0 + @$this->input->post('shipment_to_door');
		$shipment_cash_on_delivery = @$this->input->post('shipment_cash_on_delivery');

		$order = array(
			'user_id' => $user_id,
			'date_created' => time(),
			'shipment_express' => $shipment_express,
			'shipment_to_door' => $shipment_to_door,
			'shipment_cash_on_delivery' => $shipment_cash_on_delivery,
			'status' => 0,
			'price' => $this->input->post('price'),
			'questionnaire' => $this->get_questionnaire($this->input->post('questionnaire')),
		);
		$this->db->insert('order', $order);

		return $this->db->insert_id();
	}

	/**
	 * @param	$order_id
	 * @param	$products
	 */
	public function add_order_products($order_id, $products)
	{
		foreach ($products as $product => $value)
		{
			$relation = array('order_id' => $order_id, 'product_id' => $product, 'quantity' => $value);
			$this->db->insert('order2product', $relation);
		}
	}

	/**
	 * @param	$data
	 * @return	string
	 * @todo	do not direct include html
	 */
	public function get_questionnaire($data)
	{
		$questionnaire = "";

		foreach ($data as $key => $answer)
		{
			$questionnaire.= $this->lang->line('main_question'.($key+1));
			$questionnaire.= "<br />\n";
			$questionnaire.= $answer;
		}
		$questionnaire.= "<br />\n";
		$questionnaire.= @$this->input->post('affiliate');

		return $questionnaire;
	}

	/**
	 * @param	$order_id
	 */
	public function delete_order($order_id)
	{
		$this->db->delete('order', array('order_id' => $order_id));
		$this->db->delete('order2product', array('order_id' => $order_id));
	}
}
