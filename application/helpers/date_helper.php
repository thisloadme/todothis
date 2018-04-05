<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('convert_date')) {
	function convert_date($tgl)
	{
        $change = gmdate($tgl, time()+60*60*8);
        $assoc = explode("-",$change);
        $date = $assoc[2];
        $month = set_month($assoc[1]);
        $year = $assoc[0];
        return $date.' '.$month.', '.$year;
	}
}

if ( ! function_exists('set_month'))
    {
        function set_month($bln)
        {
            switch ($bln)
            {
                case 1:
                    return "January";
                    break;
                case 2:
                    return "February";
                    break;
                case 3:
                    return "March";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "May";
                    break;
                case 6:
                    return "Juny";
                    break;
                case 7:
                    return "July";
                    break;
                case 8:
                    return "August";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "October";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "December";
                    break;
            }
        }
    }

if (!function_exists('to_date')) {
    function to_date($tgl)
    {
        $change = gmdate($tgl, time()+60*60*8);
        $assoc = explode("-",$change);
        $date = $assoc[2];
        $month = to_month($assoc[1]);
        $year = $assoc[0];
        return $year.'-'.$month.'-'.$date;
    }
}

if ( ! function_exists('to_month'))
    {
        function to_month($bln)
        {
            switch ($bln)
            {
                case 'January':
                    return "1";
                    break;
                case 'February':
                    return "2";
                    break;
                case 'March':
                    return "3";
                    break;
                case 'April':
                    return "4";
                    break;
                case 'May':
                    return "5";
                    break;
                case 'Juny':
                    return "6";
                    break;
                case 'July':
                    return "7";
                    break;
                case 'August':
                    return "8";
                    break;
                case 'September':
                    return "9";
                    break;
                case 'October':
                    return "10";
                    break;
                case 'November':
                    return "11";
                    break;
                case 'December':
                    return "12";
                    break;
            }
        }
    }

/* End of file date_helper.php */
/* Location: ./application/helpers/date_helper.php */