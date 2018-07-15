<?php
class Order_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return mixed
	 * TODO: order by as parameter
	 */
	function getAllOrderIDs()
	{
		// returns an assosiative array with all orderIDs
		$this->db->select('*');
		$this->db->from('`order`');
		$this->db->order_by('date_created','desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getOrder($orderID)
	{
		$this->db->select('*');
		$this->db->from('`order`');
		$this->db->where('order.orderID', $orderID);

		$query = $this->db->get();

		return $query->row_array();
	}

	function getOrderProducts($orderID)
	{
		$this->db->select('*');
		$this->db->from('order2product');
		$this->db->where('orderID', $orderID);

		$query = $this->db->get();
		return $query->result_array();
	}

	function setOrder()
	{
		if( ! $this->input->post('order_code')) $order_code = $this->generatePassword();
		$order = array('order_code' => $order_code, 'order_name' => $this->input->post('order_name'),  'order_surname' => $this->input->post('order_surname'), 'order_email' => $this->input->post('order_email'), 'order_url' => $this->input->post('order_url'), 'order_birthdate' => $this->input->post('order_birthdate'), 'order_address' => $this->input->post('order_address'), 'order_zip' => $this->input->post('order_zip'), 'order_country' => $this->input->post('order_country'), 'order_phone' => $this->input->post('order_phone'), 'order_language' => $this->input->post('order_language'), 'order_stars' => $this->input->post('order_stars'));
		$this->db->where('orderID', $this->input->post('orderID'));
		$this->db->update('order', $order);
	}

	function setOrderStatus($orderID, $status)
	{
		if($orderID) {
			$this->db->where('orderID', $orderID);
			$this->db->update('`order`', array('status' => $status));
			return $status;
		}
		return FALSE;
	}

	function addOrder($userID)
	{

		$shippment_express = 0 + @$this->input->post('shippment_express');
		$shippment_to_door = 0 + @$this->input->post('shippment_to_door');
		$shippment_cash_on_delivery = @$this->input->post('shippment_cash_on_delivery');

		$order = array('userID' => $userID,  'date_created' => time(), 'shippment_express' => $shippment_express, 'shippment_to_door' => $shippment_to_door, 'shippment_cash_on_delivery' => $shippment_cash_on_delivery,
									 'status' => 0, 'price' => $this->input->post('price'), 'questionnaire' => $this->getQuestionnaire($this->input->post('questionnaire')));
		$this->db->insert('`order`', $order);
		return $this->db->insert_id();
	}

	function addOrderProducts($orderID, $products)
	{
		foreach($products as $product => $value) {
			$relation = array('orderID' => $orderID, 'productID' => $product, 'quantity' => $value);

			$this->db->insert('order2product', $relation);
		}
	}

	function getQuestionnaire($data)
	{
		$questionnaire= "";

		foreach($data as $key => $answer) {
			$questionnaire.= $this->lang->line('main_question'.($key+1));
			$questionnaire.= "<br />\n";
			$questionnaire.= $answer;
		}
		$questionnaire.= "<br />\n";
		$questionnaire.= @$this->input->post('affiliate');
		return $questionnaire;
	}

	function deleteOrder($orderID)
	{
		$this->db->delete('`order`', array('orderID' => $orderID));
		$this->db->delete('order2product', array('orderID' => $orderID));
	}
}
