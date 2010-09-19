<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Application Mailer
 *
 * @package     Mailers
 * @author      Joshua Priddle <jpriddle@nevercraft.net>
 */

class ApplicationMailer extends ActionMailer {

	public function __construct()
	{
		parent::__construct();
		$this->from = 'nobody@example.com';
	}

	public function test()
	{
		$this->to           = 'jpriddle@nevercraft.net';
		$this->subject      = 'This is a test';
		$this->body['name'] = 'Josh';
	}
}

/* End of file Template_hook.php */
/* Location: ./application/mailers/application_mailer.php */
