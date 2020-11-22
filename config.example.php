<?php
defined('CONFIGFILE') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| Default configuration file
| -------------------------------------------------------------------
| This file is only an example configuration.
|
| In order your application to work this file should be copied to
| config.php and edit it, according to your setup.
|
*/

return [
	// Set Application Environment see public/index.php
	'environment' => 'development',

	// This section overrides application config by using $assign_to_config in public/index.php
	'config' => [
		// General configuration see application/config/config.php
		'base_url' => 'http://simplecishop.loc/',
		'index_page' => 'index.php',
		'language' => 'english',

		// Email Server Configuration see application/config/email.php
		'useragent' => 'CodeIgniter',
		'protocol' => 'mail',
		'mailpath' => '/usr/sbin/sendmail',
		'smtp_host' => '',
		'smtp_user' => '',
		'smtp_pass' => '',
		'smtp_port' => 25,
		'smtp_timeout' => 5,
		'smtp_keepalive' => FALSE,
		'smtp_crypto' => '',
		'wordwrap' => TRUE,
		'wrapchars' => 76,
		'mailtype' => 'text',
		'validate' => 'FALSE',
		'priority' => 3,
		'crlf' => '\n',
		'newline' => '\n',
		'bcc_batch_mode' => FALSE,
		'bcc_batch_size' => 200,
		'dsn' => FALSE,

		// If the website is translatable, define the available languages here
		'supported_languages' => ['english'],
	],

	// Database configuration see application/config/database.php
	'database' => [
		'dsn'	=> '',
		'hostname' => '127.0.0.1',
		'username' => 'root',
		'password' => '',
		'database' => 'simplecishop',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',
		'pconnect' => FALSE,
		'cache_on' => FALSE,
		'cachedir' => '',
		'char_set' => 'utf8',
		'dbcollat' => 'utf8_general_ci',
		'swap_pre' => '',
		'encrypt' => FALSE,
		'compress' => TRUE,
		'stricton' => FALSE,
		'failover' => [],
		'save_queries' => TRUE
	],

	// Memcached configuration see application/config/memcached.php
	'memcached' => [
		'default' => [
			'hostname' => '127.0.0.1',
			'port'     => '11211',
			'weight'   => '1',
		],
	],

	// Contact Form configuration see application/config/contact.php
	'contact' => [
		'from' => 'your_from_email_address@here',
		'to' => 'your_to_email_address@here',
	],

	// Blocks Configuration see application/config/template_blocks.php
	'template_blocks' => [
		'welcomeBlock_view' => [
			'section' => 'contents',
			'position' => 1,
			'callback' => ['welcomeBlock', 'view'],
		],
		'categoryBlock_view' => [
			'section' => 'blocks_left',
			'position' => 1,
			'callback' => ['categoryBlock', 'view'],
		],
		'cartBlock_view' => [
			'section' => 'blocks_right',
			'position' => 1,
			'callback' => ['cartBlock', 'view'],
		],
	],

	// Payment Methods configuration see application/config/payment_methods.php
	'payment_methods' => [
		'paypal' => [
			'email' => 'your_paypal_business_email@here',
		],
	]
];
