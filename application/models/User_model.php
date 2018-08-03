<?php

/**
 * Class	User_model
 * @todo	change User model with an auth library
 */
class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Returns an associative array with all user_ids
	 *
	 * @return mixed
	 */
	public function get_all_user_ids()
	{
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	null|int	$user_id
	 * @return	mixed
	 */
	public function get_user($user_id = NULL)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.user_id', $user_id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param	$user_code
	 * @param	mixed	$user_phone_or_email
	 * @return array
	 */
	public function search_user($user_code, $user_phone_or_email = NULL)
	{
		if ($user_code && $user_phone_or_email)
		{
			$this->db->select('*');
			$this->db->from('user');

			$where="user.user_code = '".$user_code."' && (user.user_phone = '".$user_phone_or_email."' OR user.user_email = '".$user_phone_or_email."')";
			$this->db->where($where);

			$query = $this->db->get();

			return $query->row_array();
		}

		return array();
	}

	public function set_user()
	{
		if ( ! $this->input->post('user_code')) $user_code = $this->generate_password();
		else $user_code = $this->input->post('user_code');
		$user = array(
			'user_code'			=> $user_code,
			'user_name'			=> $this->input->post('user_name'),
			'user_surname'		=> $this->input->post('user_surname'),
			'user_email'		=> $this->input->post('user_email'),
			'user_url'			=> $this->input->post('user_url'),
			'user_birthdate'	=> $this->get_timestamp($this->input->post('user_birthdate')),
			'user_address' 		=> $this->input->post('user_address'),
			'user_city' 		=> $this->input->post('user_city'),
			'user_zip' 			=> $this->input->post('user_zip'),
			'user_country' 		=> $this->input->post('user_country'),
			'user_phone' 		=> $this->input->post('user_phone'),
			'user_language'		=> $this->input->post('user_language'),
			'user_stars'		=> $this->input->post('user_stars')
		);
		$this->db->where('user_id', $this->input->post('user_id'));
		$this->db->update('user', $user);
	}

	/**
	 * @return	mixed
	 */
	public function add_user()
	{
		if ( ! $this->input->post('user_code')) $user_code = $this->generate_password();
		else $user_code = $this->input->post('user_code');
		$user = array(
			'user_code'			=> $user_code,
			'user_name'			=> $this->input->post('user_name'),
			'user_surname'		=> $this->input->post('user_surname'),
			'user_email'		=> $this->input->post('user_email'),
			'user_url'			=> $this->input->post('user_url'),
			'user_birthdate'	=> $this->get_timestamp($this->input->post('user_birthdate')),
			'user_address'		=> $this->input->post('user_address'),
			'user_city'			=> $this->input->post('user_city'),
			'user_zip'			=> $this->input->post('user_zip'),
			'user_country'		=> $this->input->post('user_country'),
			'user_phone'		=> $this->input->post('user_phone'),
			'user_language'		=> $this->input->post('user_language'),
			'user_registered'	=> time(),
			'user_stars'		=> $this->input->post('user_stars')
		);
		$this->db->insert('user', $user);

		return $this->db->insert_id();
	}

	public function delete_user($user_id)
	{
		$this->db->delete('user', array('user_id' => $user_id));
	}

	/**
	 * @param	int	$length
	 * @return	string
	 */
	public function generate_password($length = 5)
	{
		$password = '';
		$possible = "0123456789bcdfghjkmnpqrstvwxyz";

		$i = 0;

		// add random characters to $password until $length is reached
		while ($i < $length)
		{
			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

			// we don't want this character if it's already in the password
			if ( ! strstr($password, $char))
			{
				$password .= $char;
				$i++;
			}
		}

		if ($this->password_exists($password)) $password = $this->generate_password();

		return $password;
	}

	/**
	 * @param	string	$password
	 * @return	bool
	 */
	public function password_exists($password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.user_code', $password);

		$query = $this->db->get();
		$row = $query->row_array();

		if (count($row) > 0) return TRUE;

		return FALSE;
	}

	/**
	 * Returns the Unix timestamp of a date
	 *
	 * @param string $date Date format DD/MM/YYYY
	 * @return false|int
	 */
	public function get_timestamp($date)
	{
		if (!$date) 
		{
			return time();
		}

		list($day, $month, $year) = explode('/', $date);

		return mktime(0, 0, 0, $month, $day, $year);
	}
}
