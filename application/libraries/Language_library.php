<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language_library
{
	/**
	 * @var	CI_Controller
	 */
	protected $CI;

	public function __construct ()
	{
		$this->CI =& get_instance();

		$this->set_language($this->get_language());
	}

	/**
	 * Sets language to session and config
	 *
	 * @param	string
	 */
	public function set_language($language)
	{
		$this->CI->session->language = $language;
		$this->CI->config->set_item('language', $language);
	}

	/**
	 * Gets language from session. Default from config
	 *
	 * @return	string
	 */
	public function get_language()
	{
		return $this->CI->session->language ?: $this->CI->config->item('language');
	}
}