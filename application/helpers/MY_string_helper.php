<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Convert a CamelCase to under_score
 *
 * @param  string  $string
 * @return string
 */

if ( ! function_exists('camel_to_underscore'))
{
  function camel_to_underscore($string)
  {
    return strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '_$1', $string));
  }
}

// ------------------------------------------------------------------------

/**
 * Format phone number - 15185554444 => (518) 555-4444
 *
 * @access public
 * @param  string  $number
 * @return string
 */

if ( ! function_exists('format_number'))
{
	function format_number($number)
	{
		return preg_replace("/^[\+]?[1]?[- ]?[\(]?([2-9][0-8][0-9])[\)]?[- ]?([2-9][0-9]{2})[- ]?([0-9]{4})$/", "(\\1) \\2-\\3", $number);
	}
}

/* End of file MY_string_helper.php */
/* Location: ./application/helpers/MY_string_helper.php */
