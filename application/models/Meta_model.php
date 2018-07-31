<?php

/**
 * Class	Meta_model
 */
class Meta_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return	array
	 */
	public function get_all_meta()
	{
		$this->db->select('*');
		$this->db->from('product_meta');
		$query = $this->db->get();
		$meta = array();
		foreach ($query->result_array() as $row)
		{
			if ( ! isset($meta[$row['meta_key']])) $meta[$row['meta_key']] = array();
			//$meta[$row['meta_key']][] = $row['meta_value'];

			if ( ! in_array($row['meta_value'], $meta[$row['meta_key']]))
				array_push($meta[$row['meta_key']], $row['meta_value']);
		}

		return $meta;
	}
}
