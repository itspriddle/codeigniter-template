<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

/**
 * Hook into the Template class and run render when a controller is done
 * This makes it so we don't have to call `$this->template->write_view()`
 * and `$this->template->render() manually in each controller
 */
$hook['post_controller'] = array(
	'class'    => 'TemplateHook',
	'function' => 'render',
	'filename' => 'Template_hook.php',
	'filepath' => 'hooks'
);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */
