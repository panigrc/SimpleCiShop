<?php

class User_model extends CI_Model {

	/**
	 * @return array
	 */
	public function get_all_user_ids(): array
	{
		$this->db->select('*');
		$this->db->from('users');
		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * @param	int	$user_id
	 * @return	null|array
	 */
	public function get_user($user_id): ?array
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.user_id', $user_id);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param array $criteria In form of ['table_name' => 'table_value',]
	 * @return null|array
	 */
	public function get_user_by(array $criteria): ?array
	{
		$this->db->select('*');
		$this->db->from('users');

		$this->db->where($criteria);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * @param int $id
	 * @param array $user_data
	 */
	public function set_user(int $id, array $user_data): void
	{
		$this->db->where('user_id', $id);
		$this->db->update('users', $this->_prepare_user_data($user_data));
	}

	/**
	 * @param	array $user_data
	 * @return	int User Id
	 */
	public function add_user(array $user_data): int
	{
		$this->db->insert('users', $this->_prepare_user_data($user_data));

		return $this->db->insert_id();
	}

	/**
	 * @param array $user_data
	 * @return array
	 */
	private function _prepare_user_data(array $user_data): array
	{
		return [
			'password'		=> empty($user_data['password'] ?? NULL) ? random_string('alnum', 16) : $user_data['password'],
			'first_name'	=> $user_data['first_name'] ?? NULL,
			'last_name'		=> $user_data['last_name'] ?? NULL,
			'email'			=> $user_data['email'] ?? NULL,
			'url'			=> $user_data['url'] ?? NULL,
			'birthdate'		=> empty($user_data['birthdate'] ?? NULL) ? NULL : $user_data['birthdate'],
			'street' 		=> $user_data['street'] ?? NULL,
			'city' 			=> $user_data['city'] ?? NULL,
			'zip' 			=> $user_data['zip'] ?? NULL,
			'country' 		=> $user_data['country'] ?? NULL,
			'phone' 		=> $user_data['phone'] ?? NULL,
			'language'		=> $user_data['language'] ?? NULL,
			'credits'		=> empty($user_data['credits'] ?? NULL) ? 0 : $user_data['credits'],
			'registered'	=> empty($user_data['registered'] ?? NULL) ? (new DateTime())->format('YYYY-MM-DD hh:mm:ss') : $user_data['registered'],
		];
	}

	public function delete_user(int $user_id): void
	{
		$this->db->delete('users', ['user_id' => $user_id]);
	}
}
