<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_news_texts_table extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
		$this->load->dbforge();
	}

	public function up()
	{
		$fields = [
			'news_text_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE,
			],
			'news_id' => [
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
				'constraint' => '50',
			],
			'body' => [
				'type' => 'TEXT',
				'default' => NULL,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('news_text_id', TRUE);
		$this->dbforge->add_key('news_id');
		$this->dbforge->add_table('news_texts', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('news_texts', TRUE);
	}
}
