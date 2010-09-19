<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Generate dropdown for timestamps
 *
 * @access  public
 * @param   string  $basename
 * @param   string  $selected
 * @return  string
 */

if ( ! function_exists('form_time_dropdown'))
{
	function form_time_dropdown($basename, $selected = array('hour' => NULL, 'minute' => NULL), $separator = ':')
	{
		$hours = array(
			'00' => '00',
			'01' => '01',
			'02' => '02',
			'03' => '03',
			'04' => '04',
			'05' => '05',
			'06' => '06',
			'07' => '07',
			'08' => '08',
			'09' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23'
		);

		$minutes = array(
			'00' => '00',
			'01' => '01',
			'02' => '02',
			'03' => '03',
			'04' => '04',
			'05' => '05',
			'06' => '06',
			'07' => '07',
			'08' => '08',
			'09' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
			'25' => '25',
			'26' => '26',
			'27' => '27',
			'28' => '28',
			'29' => '29',
			'30' => '30',
			'31' => '31',
			'32' => '32',
			'33' => '33',
			'34' => '34',
			'35' => '35',
			'36' => '36',
			'37' => '37',
			'38' => '38',
			'39' => '39',
			'40' => '40',
			'41' => '41',
			'42' => '42',
			'43' => '43',
			'44' => '44',
			'45' => '45',
			'46' => '46',
			'47' => '47',
			'48' => '48',
			'49' => '49',
			'50' => '50',
			'51' => '51',
			'52' => '52',
			'53' => '53',
			'54' => '54',
			'55' => '55',
			'56' => '56',
			'57' => '57',
			'58' => '58',
			'59' => '59',
		);

		$out  = form_dropdown("{$basename}[hour]", $hours, $selected['hour']);
		$out .= $separator;
		$out .= form_dropdown("{$basename}[minute]", $minutes, $selected['minute']);

		return $out;
	}
}

// ------------------------------------------------------------------------

/**
 * Generate dropdowns to select a date
 *
 * @access  public
 * @param   string  $basename  HTML name prefix; IE: <select name="$basename_month">
 * @param   array   $selected  Month, day, and year to mark as selected
 * @return  string
 */

if ( ! function_exists('form_date_dropdown'))
{
	function form_date_dropdown($basename, $selected = array('month' => NULL, 'day' => NULL, 'year' => NULL))
	{
		if (is_null($selected['month'])) $selected['month'] = date('m');
		if (is_null($selected['year']))  $selected['year']  = date('Y');
		if (is_null($selected['day']))   $selected['day']   = date('d');

		$months = array(
			'01' => 'Jan',
			'02' => 'Feb',
			'03' => 'Mar',
			'04' => 'Apr',
			'05' => 'May',
			'06' => 'Jun',
			'07' => 'Jul',
			'08' => 'Aug',
			'09' => 'Sep',
			'10' => 'Oct',
			'11' => 'Nov',
			'12' => 'Dec'
		);

		$days = array(
			'01' => '01',
			'02' => '02',
			'03' => '03',
			'04' => '04',
			'05' => '05',
			'06' => '06',
			'07' => '07',
			'08' => '08',
			'09' => '09',
			'10' => '10',
			'11' => '11',
			'12' => '12',
			'13' => '13',
			'14' => '14',
			'15' => '15',
			'16' => '16',
			'17' => '17',
			'18' => '18',
			'19' => '19',
			'20' => '20',
			'21' => '21',
			'22' => '22',
			'23' => '23',
			'24' => '24',
			'25' => '25',
			'26' => '26',
			'27' => '27',
			'28' => '28',
			'29' => '29',
			'30' => '30',
			'31' => '31'
		);

		$years = array();

		for ($y = date('Y'); $y >= 2006; $y--)
		{
			$years[$y] = $y;
		}

		// Month
		$out = form_dropdown($basename.'[month]', $months, $selected['month'], 'class="month"') .' ';

		// Day
		$out .= form_dropdown($basename.'[day]', $days, $selected['day'], 'class="day"') .' ';

		// Year
		$out .= form_dropdown($basename.'[year]', $years, $selected['year'], 'class="year"');

		return $out;
	}
}

/* End of file MY_form_helper.php */
/* Location: ./application/helpers/MY_form_helper.php */
