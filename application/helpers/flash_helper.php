<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package   CodeIgniter
 * @author    Rick Ellis
 * @copyright Copyright (c) 2006, EllisLab, Inc.
 * @license   http://www.codeignitor.com/user_guide/license.html
 * @link      http://www.codeigniter.com
 * @since     Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Flash Helper
 *
 * Uses the native Session/Flashdata functions from CI 1.6 to display
 * 'Flash Notices'
 *
 * @package     CodeIgniter
 * @subpackage  Helpers
 * @category    Helpers
 * @author      Joshua Priddle <jpriddle@nevercraft.net>
 * @version     1.0
 */

class flash {

	// Add something to keep flashdata until its actually printed

	/**
	 * Add Message to Flash Notice log
	 *
	 * Takes a string and appends it to the _FlashNotice array
	 *
	 * NOTE: There are also individual helper functions for warning and success messages
	 *
	 * @static
	 * @access	public
	 * @param	string $message to be displayed
	 * @return	void
	 */
	static function add($message, $type = 'warning', $method = 'flash')
	{
		$CI =& get_instance();
		
		if ($method == 'flash')
		{
			if (($flash = $CI->session->userdata("{$CI->session->flashdata_key}:new:NOTICE")) !== FALSE)
			{
			    $FN = (is_array($flash) ? $flash : array($flash));
			}
			else
			{
			    $FN = array();
			}

			$FN[] = array($type => $message);
			$CI->session->set_flashdata(array('NOTICE' => $FN));
		}
		elseif ($method == 'static')
		{
			if (($static = $CI->session->userdata(':static:NOTICE')) !== FALSE)
			{
				$FN = (is_array($static) ? $static : array($static));
			}
			else
			{
				$FN[] = array();
			}

			$FN[] = array($type => $message);
			$CI->session->set_userdata(array(':static:NOTICE' => $FN));
		}

	}
	
    // ------------------------------------------------------------------------

	/**
	 * Add a warning message
	 *
	 * @static
	 * @access	public
	 * @param	string $message to be displayed
	 * @return	void
	 */
	static function warning($message, $method = 'flash')
	{
		self::add($message, 'warning', $method);
	}
	
    // ------------------------------------------------------------------------

	/**
	 * Add a success message
	 *
	 * @static
	 * @access	public
	 * @param	string $message to be displayed
	 * @return	void
	 */
	static function success($message, $method = 'flash')
	{
		self::add($message, 'success', $method);
	}

	// ------------------------------------------------------------------------

	/**
	 * Display Flash Notice Messages
	 *
	 * Displays the HTML for the Flash Notice Message if any messages have been stored
	 *
	 * @static
	 * @access	public
	 * @param	array $layout HTML to use for output (optional)
	 * @return	void
	 */
	static function display($template = NULL)
	{
		$CI =& get_instance();

		$FN = array();
		
		$FLASH = $CI->session->flashdata('NOTICE');
		
		$STATIC = $CI->session->userdata(':static:NOTICE');

		if ($FLASH === FALSE && $STATIC === FALSE)	return;
		
		if ($STATIC !== FALSE)
		{
			$FN = $FN + $STATIC;
			$CI->session->unset_userdata(':static:NOTICE');
		}
		
		if ($FLASH !== FALSE)
		{
			$FN = $FN + $FLASH;
		}
	
		if ($template == NULL)
		{
			$template = self::_default_template();
		}

		$out = $template['header'];
		
		foreach ($FN as $F)
		{
			foreach ($F as $type => $msg)
			{
				$msg = trim($msg);
				if (substr($msg, 0, 3) != '<p>' && substr($msg, -4) != '</p>' && strpos($msg, '<p>') === FALSE)
				{
					$msg = "<p>$msg</p>";
				}
				$out .= str_ireplace("{type}", $type, $template['m_header']);
				$out .= str_ireplace("{message}", $msg, $template['content']);
				$out .= $template['m_footer'];
			}
		}
		$out .= $template['footer'];
		echo $out;
	}

    // ------------------------------------------------------------------------

	/**
	 * Default Template
	 *
	 * Provides a default template for use with flash notices.
	 *
	 * @static
	 * @access	public
	 * @param	array $layout HTML to use for output (optional)
	 * @return	void
	 */
	private function _default_template()
	{
		return array(
			'header'   => "<div id=\"warnings\">\n",
			'footer'   => "</div>\n",
			'content'  => "{message}",
			'm_header' => "\t<div class=\"{type}\">\n",
			'm_footer' => "\t</div>\n",
		);

	}
	
	// ------------------------------------------------------------------------
	
}
