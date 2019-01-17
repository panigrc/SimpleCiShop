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
			'news_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'published' => [
				'type' => 'INT',
				'constraint' => 10,
				'null' => TRUE,
			],
			'updated' => [
				'type' => 'INT',
				'constraint' => 10,
				'null' => TRUE,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('news_id', TRUE);
		$this->dbforge->add_table('news', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('news', TRUE);
	}
}
