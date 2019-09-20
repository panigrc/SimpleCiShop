<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Template Block Configuration
| -------------------------------------------------------------------
| section: The blocks are being appended to the sections in the
| Template_library.
|
| rule: Regular expression in which sites should the block being
| displayed.
|
| callback: The callback must be a valid callable.
|
| Prototype:
|
|  $config['blocks'] = [
|      [
|          'section',
|          'rule',
|          'callback',
|      ],
|  ];
|
*/
$config['blocks'] = [
	[
		'section' => 'contents',
		'rule' => '*',
		'callback' => [],
	],
];
