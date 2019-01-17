<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_order_categories_table extends CI_Migration
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
			'relation_id' => [
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
			'category_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('relation_id', TRUE);
		$this->dbforge->add_key([
			'product_id',
			'category_id',
		]);
		$this->dbforge->create_table('order_categories', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('order_categories', TRUE);
	}
}
