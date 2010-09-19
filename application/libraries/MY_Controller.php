<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ApplicationController (MY_Controller)
 *
 * This controller will be loaded immediately after CodeIgniter's base
 * Controller class. All Controllers should inherit from this class.
 *
 * @author  Joshua Priddle <jpriddle@nevercraft.net
 * @package Controllers
 **/

class ApplicationController extends Controller {

	public $view_data       = array();
	public $render_template = TRUE;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		log_message('debug', 'Application Class Initialized');
	}

	// --------------------------------------------------------------------

	public function is_ajax()
	{
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
		  $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
	}

}

/**
 * AdminController
 *
 * Uncomment this and add special functions for admin specific controllers
 *
 * @author  Joshua Priddle <jpriddle@nevercraft.net
 * @package Controllers
 */

class AdminController extends ApplicationController { }

/* End of file MY_Controller.php */
/* Location: ./application/libraries/MY_Controller.php */
