<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users_table extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}

	public function up()
	{
		$fields = [
			'user_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '60',
			],
			'first_name' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE,
			],
			'last_name' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '200',
			],
			'url' => [
				'type' => 'VARCHAR',
				'constraint' => '250',
				'null' => TRUE,
			],
			'birthdate' => [
				'type' => 'DATE',
				'null' => TRUE,
			],
			'city' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			],
			'zip' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE,
			],
			'country' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE,
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
				'null' => TRUE,
			],
			'language' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],
			'registered' => [
				'type' => 'DATETIME',
				'null' => TRUE,
			],
			'credits' => [
				'type' => 'INT',
				'constraint' => 11,
				'null' => TRUE,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('user_id', TRUE);
		$this->dbforge->add_key('email');
		$this->dbforge->add_table('users', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('users', TRUE);
	}
}
