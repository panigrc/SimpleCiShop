<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_product_texts_table extends CI_Migration
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
			'product_text_id' => [
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
			'language' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => '150',
			],
			'description' => [
				'type' => 'TEXT',
				'null' => TRUE,
			],
			'price' => [
				'type' => 'DECIMAL',
				'constraint' => [
					11,
					2
				],
				'null' => TRUE,
			],
			'price_old' => [
				'type' => 'DECIMAL',
				'constraint' => [
					11,
					2
				],
				'null' => TRUE,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('product_text_id', TRUE);
		$this->dbforge->add_key('product_id');
		$this->dbforge->create_table('product_texts', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('product_texts', TRUE);
	}
}
