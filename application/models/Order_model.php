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
	 * Returns an associative array with all orderIDs
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
	 * @param	$orderID
	 * @return	mixed
	 */
	public function get_order($orderID)
	{
		$this->db->select('*');
		$this->db->from('`order`');
		$this->db->where('order.orderID', $orderID);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$orderID
	 * @return	mixed
	 */
	public function get_order_products($orderID)
	{
		$this->db->select('*');
		$this->db->from('order2product');
		$this->db->where('orderID', $orderID);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function set_order()
	{
		if ( ! $this->input->post('order_code')) $order_code = $this->generate_password();
		$order = array('order_code' => $order_code, 'order_name' => $this->input->post('order_name'),  'order_surname' => $this->input->post('order_surname'), 'order_email' => $this->input->post('order_email'), 'order_url' => $this->input->post('order_url'), 'order_birthdate' => $this->input->post('order_birthdate'), 'order_address' => $this->input->post('order_address'), 'order_zip' => $this->input->post('order_zip'), 'order_country' => $this->input->post('order_country'), 'order_phone' => $this->input->post('order_phone'), 'order_language' => $this->input->post('order_language'), 'order_stars' => $this->input->post('order_stars'));
		$this->db->where('orderID', $this->input->post('orderID'));
		$this->db->update('order', $order);
	}

	/**
	 * @param	$orderID
	 * @param	$status
	 * @return	bool
	 */
	public function set_order_status($orderID, $status)
	{
		if ($orderID)
		{
			$this->db->where('orderID', $orderID);
			$this->db->update('`order`', array('status' => $status));

			return $status;
		}

		return FALSE;
	}

	/**
	 * @param	$userID
	 * @return	mixed
	 */
	public function add_order($userID)
	{
		$shippment_express = 0 + @$this->input->post('shippment_express');
		$shippment_to_door = 0 + @$this->input->post('shippment_to_door');
		$shippment_cash_on_delivery = @$this->input->post('shippment_cash_on_delivery');

		$order = array('userID' => $userID,
									 'date_created' => time(),
									 'shippment_express' => $shippment_express,
									 'shippment_to_door' => $shippment_to_door,
									 'shippment_cash_on_delivery' => $shippment_cash_on_delivery,
									 'status' => 0,
									 'price' => $this->input->post('price'),
									 'questionnaire' => $this->get_questionnaire($this->input->post('questionnaire'))
		);
		$this->db->insert('`order`', $order);

		return $this->db->insert_id();
	}

	/**
	 * @param	$orderID
	 * @param	$products
	 */
	public function add_order_products($orderID, $products)
	{
		foreach ($products as $product => $value)
		{
			$relation = array('orderID' => $orderID, 'productID' => $product, 'quantity' => $value);
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
		$questionnaire= "";

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
	 * @param	$orderID
	 */
	public function delete_order($orderID)
	{
		$this->db->delete('`order`', array('orderID' => $orderID));
		$this->db->delete('order2product', array('orderID' => $orderID));
	}
}
