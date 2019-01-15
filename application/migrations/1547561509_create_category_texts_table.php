<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_category_texts_table extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}

	public function up()
	{
		$fields = [
			'category_text_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'category_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
			],
			'language' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
				'default' => NULL,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
				'default' => NULL,
			],
			'description' => [
				'type' => 'TEXT',
				'default' => NULL,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('category_text_id', TRUE);
		$this->dbforge->add_key('category_id');
		$this->dbforge->add_table('category_texts', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('category_texts', TRUE);
	}
}
