<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Convert N seconds into timestamp - 90 => 1:30
 *
 * @access  public
 * @param   string  $seconds
 * @return  string
 */

if ( ! function_exists('seconds_to_time'))
{
	function seconds_to_time($seconds = 0, $hours_to_days = FALSE)
	{
		$out = '';
		$days = '';
		$hours = '';
		$mins = '';
		$secs = '';

		$mins = str_pad(floor($seconds / 60), 2, '0', STR_PAD_LEFT). ':';

		if ($mins >= 60)
		{
			$hours = floor($mins / 60). ':';
			$mins = str_pad($mins - ($hours * 60), 2, '0', STR_PAD_LEFT). ':';
		}

		if ($hours_to_days && $hours >= 24)
		{
			$days = floor($hours / 24).' days, ';
			$hours = floor($hours % 24).':';
		}

		$secs = str_pad(floor($seconds % 60), 2, '0', STR_PAD_LEFT);

		return $days.$hours.$mins.$secs;
	}
}

// ------------------------------------------------------------------------

/**
 * Convert timestamp into N seconds - 1:30 => 90
 *
 * @access  public
 * @param   string  $seconds
 * @return  string
 */
if ( ! function_exists('time_to_seconds'))
{
	function time_to_seconds($timestamp = '00:00:00')
	{
		$segs = explode(':', $timestamp);
		$count = count($segs);

		switch ($count)
		{
			case 3:
				$secs = (($segs[0] * 3600) + ($segs[1] * 60) + $segs[2]);
				break;

			case 2:
				$secs = (($segs[0] * 60) + $segs[1]);
				break;

			default:
				$secs = $segs[0];
				break;
		}

		return $secs;
	}
}

// ------------------------------------------------------------------------

/**
 * Convert HH:MM military to AM/PM time
 *
 * @access  public
 * @param   string  $seconds
 * @return  string
 */

if ( ! function_exists('military_to_ampm'))
{
	function military_to_ampm($time = '')
	{
		$segs = explode(':', $time);
		$count = count($segs);

		switch ($count)
		{
			case 3:
			case 2:
				if ($segs[0] > 12)
				{
					$segs[0] -= 12;
					$ampm = 'p';
				}
				else
				{
					$segs[0] = (int) $segs[0]; // strip leading 0
					$ampm = ($segs[0] == 12 ? 'p' : 'a');
				}
				return "{$segs[0]}:{$segs[1]}{$ampm}";
				break;

			default:
				return $time;
				break;
		}
	}
}

/* End of file time_helper.php */
/* Location: ./application/helpers/time_helper.php */
