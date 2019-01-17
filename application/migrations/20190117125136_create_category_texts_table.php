<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_category_texts_table extends CI_Migration
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
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'description' => [
				'type' => 'TEXT',
				'null' => TRUE,
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
