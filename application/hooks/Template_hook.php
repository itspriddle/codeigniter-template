<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Template Hook
 *
 * This hook automatically loads views based on their controller/method names.
 *
 * @author  Joshua Priddle <jpriddle@nevercraft.net
 * @version 0.0.1
 * @package Hooks
 **/

class TemplateHook {

	function __construct()
	{
		$this->ci =& get_instance();
	}

	// --------------------------------------------------------------------

	function render()
	{
		if ($this->ci->render_template == TRUE)
		{
			if ( ! $this->ci->is_ajax())
			{
				if (isset($this->ci->template))
				{
					if (isset($this->ci->view))
					{
						$view = $this->ci->view . '.php';
					}
					else
					{
						$view = $this->ci->router->class . '/' . $this->ci->router->method . '.php';
					}
					if (file_exists(APPPATH.'views/'.$view))
					{
						$this->ci->template->write_view('content', $view, $this->ci->view_data);
					}
					$this->ci->template->render();
				}
			}
		}
	}

	// --------------------------------------------------------------------

}

/* End of file Template_hook.php */
/* Location: ./application/hooks/Template_hook.php */
