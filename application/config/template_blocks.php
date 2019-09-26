<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Template Block Configuration
| -------------------------------------------------------------------
| section [string]: The blocks are being appended to the sections in the
| Template_library.
|
| position [int]: The position in which the block should be placed.
|
| rule [sting]: Regular expression in which sites should the block being
| displayed.
|
| callback [array]: The callback must be a valid callable.
|
| Prototype:
|
|  $config['blocks'] = [
|      [
|          'section',
|          'position',
|          'rule',
|          'callback',
|      ],
|  ];
|
*/
$config['blocks'] = [
	[
		'section' => 'contents',
		'position' => 1,
		'rule' => '/.*/',
		'callback' => ['welcomeBlock', 'view'],
	],
];
