<?php

/**
 * Class	Language
 */
class Language extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Sets the language and redirects to referrer
	 *
	 * @param string $language
	 */
	public function set($language = NULL)
	{
		if ($language === null)
		{
			show_404($this->input->server('PHP_SELF'));
		}

		try
		{
			$this->language_library->set_language($language);
		}
		catch (Exception $exception)
		{
			show_404($this->input->server('PHP_SELF'));
		}

		$this->load->library('user_agent');

		if ($this->agent->is_referral())
		{
			redirect($this->agent->referrer());
		}

		redirect();
	}

}
