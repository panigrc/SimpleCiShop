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
| callback [array]: The callback must be a valid callable.
|
| Prototype:
|
|  $config['blocks'] = [
|      [
|          'section',
|          'position',
|          'callback',
|      ],
|  ];
|
*/
$config['blocks'] = [
	[
		'section' => 'contents',
		'position' => 1,
		'callback' => ['welcomeBlock', 'view'],
	],
	[
		'section' => 'blocks_left',
		'position' => 1,
		'callback' => ['categoryBlock', 'view'],
	],
	[
		'section' => 'blocks_right',
		'position' => 1,
		'callback' => ['cartBlock', 'view'],
	],

];
