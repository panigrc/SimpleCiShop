<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| ----------------------------------------------------------------------------------------
| File upload preferences
| ----------------------------------------------------------------------------------------
| This file contains the configuration for the Upload Class
| Please see the user guide for info:
|
|	https://www.codeigniter.com/userguide3/libraries/file_uploading.html#setting-preferences
|
*/

$config['upload_path']		= './images/';
$config['allowed_types']	= 'gif|jpg|png';
$config['max_size']				= '0';
$config['max_width']			= '0';
$config['max_height']			= '0';
