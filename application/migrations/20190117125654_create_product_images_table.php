<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_product_images_table extends CI_Migration
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
			'product_image_id' => [
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
			'title' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
				'null' => TRUE,
			],
			'thumb' => [
				'type' => 'VARCHAR',
				'constraint' => 250,
				'null' => TRUE,
			],
			'big' => [
				'type' => 'VARCHAR',
				'constraint' => 250,
				'null' => TRUE,
			],
			'main' => [
				'type' => 'INT',
				'constraint' => 1,
				'null' => TRUE,
			],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('product_image_id', TRUE);
		$this->dbforge->add_key('product_id');
		$this->dbforge->add_table('product_images', TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table('product_images', TRUE);
	}
}
