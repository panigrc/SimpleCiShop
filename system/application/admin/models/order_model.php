<?php
class Order_model extends Model {

	function Order_model()
	{
		parent::Model();
	}
	
	function getAllOrderIDs()
	{
		// returns an assosiative array with all orderIDs
		$this->db->select('*');
		$this->db->from('`order`');
		$this->db->orderby('date_created','desc');
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
		if(!$this->input->post('order_code')) $order_code = $this->generatePassword();
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
		return false;
	}
	
	
	function deleteOrder($orderID)
	{
		$this->db->delete('`order`', array('orderID' => $orderID));
		$this->db->delete('order2product', array('orderID' => $orderID));
	}
}
?>
