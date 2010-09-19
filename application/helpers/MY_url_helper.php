<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Redirect http to https
 *
 * @param  string  $string
 * @return string
 */

if ( ! function_exists('force_ssl'))
{
	function force_ssl()
	{
		$CI =& get_instance();
		$CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
		if ($_SERVER['SERVER_PORT'] != 443)
		{
			redirect($CI->uri->uri_string());
		}
	}
}

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */
