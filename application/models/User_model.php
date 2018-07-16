<?php

/**
 * Class	User_model
 * @todo	change User model with an auth library
 */
class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Returns an associative array with all userIDs
	 *
	 * @return mixed
	 */
	function get_all_user_ids()
	{
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	null|int	$userID
	 * @return	mixed
	 */
	function get_user($userID = NULL)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.userID', $userID);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$user_code
	 * @param	mixed	$user_phone_or_email
	 * @return array
	 */
	function search_user($user_code, $user_phone_or_email = NULL)
	{
		if($user_code && $user_phone_or_email) {
			$this->db->select('*');
			$this->db->from('user');

			$where="user.user_code = '".$user_code."' && (user.user_phone = '".$user_phone_or_email."' OR user.user_email = '".$user_phone_or_email."')";
			$this->db->where($where);

			$query = $this->db->get();

			return $query->row_array();
		}

		return array();
	}

	function set_user()
	{
		if( ! $this->input->post('user_code')) $user_code = $this->generate_password();
		else $user_code = $this->input->post('user_code');
		$user = array('user_code' => $user_code,
									'user_name' => $this->input->post('user_name'),
									'user_surname' => $this->input->post('user_surname'),
									'user_email' => $this->input->post('user_email'),
									'user_url' => $this->input->post('user_url'),
									'user_birthdate' => $this->get_timestamp($this->input->post('user_birthdate')),
									'user_address' => $this->input->post('user_address'),
									'user_city' => $this->input->post('user_city'),
									'user_zip' => $this->input->post('user_zip'),
									'user_country' => $this->input->post('user_country'),
									'user_phone' => $this->input->post('user_phone'),
									'user_language' => $this->input->post('user_language'),
									'user_stars' => $this->input->post('user_stars')
		);
		$this->db->where('userID', $this->input->post('userID'));
		$this->db->update('user', $user);
	}

	/**
	 * @return	mixed
	 */
	function add_user()
	{
		if( ! $this->input->post('user_code')) $user_code = $this->generate_password();
		else $user_code = $this->input->post('user_code');
		$user = array('user_code' => $user_code,
									'user_name' => $this->input->post('user_name'),
									'user_surname' => $this->input->post('user_surname'),
									'user_email' => $this->input->post('user_email'),
									'user_url' => $this->input->post('user_url'),
									'user_birthdate' => $this->get_timestamp($this->input->post('user_birthdate')),
									'user_address' => $this->input->post('user_address'),
									'user_city' => $this->input->post('user_city'),
									'user_zip' => $this->input->post('user_zip'),
									'user_country' => $this->input->post('user_country'),
									'user_phone' => $this->input->post('user_phone'),
									'user_language' => $this->input->post('user_language'),
									'user_registered' => time(),
									'user_stars' => $this->input->post('user_stars')
		);
		$this->db->insert('user', $user);

		return $this->db->insert_id();
	}

	function delete_user($userID)
	{
		$this->db->delete('user', array('userID' => $userID));
	}

	/**
	 * @param	int	$length
	 * @return	string
	 */
	function generate_password($length = 5)
	{
		$password = '';
		$possible = "0123456789bcdfghjkmnpqrstvwxyz";

		$i = 0;

		// add random characters to $password until $length is reached
		while ($i < $length) {

			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

			// we don't want this character if it's already in the password
			if ( ! strstr($password, $char)) {
				$password .= $char;
				$i++;
			}
		}

		if($this->password_exists($password)) $password = $this->generate_password();

		return $password;
	}

	/**
	 * @param	string	$password
	 * @return	bool
	 */
	function password_exists($password) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.user_code', $password);

		$query = $this->db->get();
		$row = $query->row_array();

		if(count($row) > 0) return TRUE;

		return FALSE;
	}

	/**
	 * Returns the Unix timestamp of a date
	 *
	 * @param string $date Date format DD/MM/YYYY
	 * @return false|int
	 */
	function get_timestamp($date) {
		if( ! $date) return time();
		list($day, $month, $year) = explode('/', $date);

		return mktime(0, 0, 0, $month, $day, $year);
	}
}
