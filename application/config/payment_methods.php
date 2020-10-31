<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['payment_methods'] = [
	'paypal' => [
		'email' => 'your_paypal_business_email@here',
	],
];

$configFile = include CONFIGFILE;
$config['payment_methods'] = array_merge($config['payment_methods'], $configFile['payment_methods'] ?? []);
unset($configFile);
