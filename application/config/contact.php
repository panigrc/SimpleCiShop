<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['contact'] = [
	'from' => 'your_from_email_address@here',
	'to' => 'your_to_email_address@here',
];

$configFile = include CONFIGFILE;
$config['contact'] = array_merge($config['contact'], $configFile['contact'] ?? []);
unset($configFile);
