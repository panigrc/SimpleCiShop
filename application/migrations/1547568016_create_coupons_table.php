<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_coupons_table extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}

	public function up()
	{
		$fields = [
			'coupon_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'coupon_number' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'default' => NULL,
			],
			'used' => [
				'type' => 'INT',
				'constraint' => 1,
				'default' => 0,
			],
			'type' => [
				'type' => 'INT',
				'constraint' => 1,
				'default' => 0,
			],
			'discount' => [
				'type' => 'INT',
				'constraint' => 5,
				'default' => 0,
			],
			'expires' => [
				'type' => 'INT',
				'constraint' => '10',
				'default' => NULL,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('coupon_id', TRUE);
		$this->dbforge->add_key('coupon_number');
		$this->dbforge->add_table('coupons', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('coupons', TRUE);
	}
}
