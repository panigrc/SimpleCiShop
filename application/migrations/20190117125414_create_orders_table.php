<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_orders_table extends CI_Migration
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
			'order_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'created' => [
				'type' => 'INT',
				'constraint' => 10,
				'null' => TRUE,
			],
			'status' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => TRUE,
			],
			'shipment_express' => [
				'type' => 'INT',
				'constraint' => 1,
				'default' => 0,
			],
			'shipment_to_door' => [
				'type' => 'INT',
				'constraint' => 1,
				'default' => 0,
			],
			'shipment_cash_on_delivery' => [
				'type' => 'INT',
				'constraint' => 1,
				'default' => 0,
			],
			'price' => [
				'type' => 'DECIMAL',
				'constraint' => [
					11,
					2
				],
				'null' => TRUE,
			],
			'coupon_id' => [
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE,
			],
			'questionnaire' => [
				'type' => 'TEXT',
				'null' => TRUE,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('order_id', TRUE);
		$this->dbforge->add_key('user_id');
		$this->dbforge->create_table('orders', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('orders', TRUE);
	}
}
