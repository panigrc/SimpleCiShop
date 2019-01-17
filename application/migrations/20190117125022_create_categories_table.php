<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_categories_table extends CI_Migration
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
			'category_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'parent_category_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'nicename' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
				'unique' => TRUE,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('category_id', TRUE);
		$this->dbforge->add_key('parent_category_id');
		$this->dbforge->add_table('categories', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('categories', TRUE);
	}
}
