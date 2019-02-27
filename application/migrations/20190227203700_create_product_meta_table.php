<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_product_meta_table extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
		$this->load->database();
	}

	public function up()
	{
		$fields = [
			'meta_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'product_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'meta_key' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'meta_value' => [
				'type' => 'TEXT',
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('meta_id', TRUE);
		$this->dbforge->add_key('product_id');
		$this->dbforge->add_key('meta_key');
		$this->dbforge->create_table('product_meta', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('product_meta', TRUE);
	}
}
