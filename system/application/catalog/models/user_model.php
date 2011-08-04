<?php
class User_model extends Model {
	function User_model()
	{
		parent::Model();
	}
	
	function getAllUserIDs()
	{
		// returns an assosiative array with all userIDs
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function getUser($userID=null)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.userID', $userID);
		
		$query = $this->db->get();
		
		return $query->row_array();
	}
	
	function searchUser($user_code, $user_phone_or_email=null)
	{
		if($user_code && $user_phone_or_email) {
			$this->db->select('*');
			$this->db->from('user');
			
			$where="user.user_code = '".$user_code."' AND (user.user_phone = '".$user_phone_or_email."' OR user.user_email = '".$user_phone_or_email."')";
			$this->db->where($where);
			
			$query = $this->db->get();
			
			return $query->row_array();
		}
		return array();
	}
	
	function setUser()
	{
		$user = array('user_name' => $this->input->post('user_name'),  'user_surname' => $this->input->post('user_surname'), 'user_email' => $this->input->post('user_email'), 'user_url' => $this->input->post('user_url'), 'user_birthdate' => $this->getTimestamp($this->input->post('user_birthdate')), 'user_address' => $this->input->post('user_address'), 'user_city' => $this->input->post('user_city'), 'user_zip' => $this->input->post('user_zip'), 'user_country' => $this->input->post('user_country'), 'user_phone' => $this->input->post('user_phone'), 'user_language' => $this->input->post('user_language'), 'user_stars' => $this->input->post('user_stars') + 15);
		$this->db->where('userID', $this->input->post('userID'));
		$this->db->update('user', $user);
	}
	
	function addUser()
	{
		$user_code = $this->generatePassword();
		$user = array('user_code' => $user_code, 'user_name' => $this->input->post('user_name'),  'user_surname' => $this->input->post('user_surname'), 'user_email' => $this->input->post('user_email'), 'user_url' => $this->input->post('user_url'), 'user_birthdate' => $this->getTimestamp($this->input->post('user_birthdate')), 'user_address' => $this->input->post('user_address'), 'user_city' => $this->input->post('user_city'), 'user_zip' => $this->input->post('user_zip'), 'user_country' => $this->input->post('user_country'), 'user_phone' => $this->input->post('user_phone'), 'user_language' => $this->input->post('user_language'), 'user_registered' => time(), 'user_stars' => $this->input->post('user_stars') + 15);
		$this->db->insert('user', $user);
		return $this->db->insert_id();
	}
	
	function deleteUser()
	{
		$this->db->delete('user', array('userID' => $userID));
	}
	
	function generatePassword ($length = 5)
	{
	
		// start with a blank password
		$password = "";
	
		// define possible characters
		$possible = "0123456789bcdfghjkmnpqrstvwxyz"; 
		
		// set up a counter
		$i = 0; 
		
		// add random characters to $password until $length is reached
		while ($i < $length) { 
	
		// pick a random character from the possible ones
		$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
		
		// we don't want this character if it's already in the password
		if (!strstr($password, $char)) { 
			$password .= $char;
			$i++;
		}
	
		}
	
		// done!
		if($this->passwordExists($password)) $password = $this->generatePassword();
		return $password;
	
	}
	
	function passwordExists($password) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.user_code', $password);
		
		$query = $this->db->get();
		$row = $query->row_array();
		if(count($row) > 0) return true;
		return false;
	}
	
	function getTimestamp($date) {
		// Returns the Unix timestamp of a date (DD/MM/YYYY)
		if(!$date) return time();
		list($day, $month, $year) = explode('/', $date);
		return mktime(0, 0, 0, $month, $day, $year);
	}
}
?>
