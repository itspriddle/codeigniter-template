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

/* End of file MY_string_helper.php */
/* Location: ./application/helpers/MY_string_helper.php */
