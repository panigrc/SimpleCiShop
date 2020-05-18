<?php

class Meta_model extends CI_Model {

	/**
	 * @return	array
	 */
	public function get_all_meta(): array
	{
		$this->db->select('*');
		$this->db->from('product_meta');
		$query = $this->db->get();
		$meta = array();
		foreach ($query->result_array() as $row)
		{
			if (false === isset($meta[$row['meta_key']]))
			{
				$meta[$row['meta_key']] = array();
			}

			if (false === in_array($row['meta_value'], $meta[$row['meta_key']], TRUE))
			{
				$meta[$row['meta_key']][] = $row['meta_value'];
			}
		}

		return $meta;
	}
}
