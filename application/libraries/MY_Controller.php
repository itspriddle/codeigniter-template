<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| MY_Controller
| -------------------------------------------------------------------------
|
| This file will be included after CI's parent Controller class
|
*/

class ApplicationController extends Controller {

	public $view_data       = array();
	public $render_template = TRUE;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		log_message('debug', 'Application Class Initialized');
	}

	public function is_ajax()
	{
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
		  $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/libraries/MY_Controller.php */
