<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Application Mailer
 *
 * Load with: $this-load->mailer("application_mailer")
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

	//-----------------------------------------------------------------------

  /**
   * test
   *
   * Send with deliver_test();
   *
   * From a controller with mailer loaded:
   * $this->application_mailer->deliver_test();
   *
   * @return void
   */

	public function test()
	{
		$this->to           = 'jpriddle@nevercraft.net';
		$this->subject      = 'This is a test';
		$this->body['name'] = 'Josh';
	}
}

/* End of file application_mailer.php */
/* Location: ./application/mailers/application_mailer.php */
