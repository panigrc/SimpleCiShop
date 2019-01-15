<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_order_products_table extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
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
			'order_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'product_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'quantity' => [
				'type' => 'INT',
				'constraint' => 11,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('relation_id', TRUE);
		$this->dbforge->add_key('order_id');
		$this->dbforge->add_table('product_id', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('order_products', TRUE);
	}
}
