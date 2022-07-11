<?php 
use App\Helpers\NepaliCalendar;
if (! function_exists('convertDate')) {
  function convertDate($date)
	{
		$calendar = new NepaliCalendar();
		$timestamp  = strtotime($date);
		$year 		= date('Y', $timestamp);
		$month 		= date('m', $timestamp);
		$day 		= date('d', $timestamp);
		$nepdate = $calendar->eng_to_nep($year, $month, $day);
		$nepali_month = $nepdate['month'];
		$nepali_date  = $nepdate['date'];
		if (strlen($nepali_month) == 1) {
			$nepali_month = '0' . $nepali_month;
		} elseif (strlen($nepali_month) == 2) {
			$nepali_month;
		}
		if (strlen($nepali_date) == 1) {
			$nepali_date = '0' . $nepali_date;
		} elseif (strlen($nepali_date) == 2) {
			$nepali_date;
		}
		$finaldate = $nepdate['year'] . '-' . $nepali_month . '-' . $nepali_date;
		return $finaldate;
	}
}

if( !function_exists('get_current_year')) {
	function get_current_year() {
		$current_date = convertDate(date('Y-m-d'));
		$exp = explode('-', $current_date);
		$year = $exp[0];
		return $year;
	}
}

if( !function_exists('get_current_month')) {
	function get_current_month() {
		$current_date = convertDate(date('Y-m-d'));
		$exp = explode('-', $current_date);
		$month = $exp[1];
		return $month;
	}
}

if ( !function_exists('getNepaliMonthName') ) {
	function getNepaliMonthName($num)
	{
		if ($num == 1) {
			$month = 'वैशाख';

		} elseif ($num == 2) {
			$month = 'ज्येष्ठ';

		} elseif ($num == 3) {
			$month = 'आषाढ';

		} elseif ($num == 4) {
			$month = 'श्रावण';

		} elseif ($num == 5) {
			$month = 'भाद्र';

		} elseif ($num == 6) {
			$month = 'आश्विन';

		} elseif ($num == 7) {
			$month = 'कार्तिक';

		} elseif ($num == 8) {
			$month = 'मार्ग';

		} elseif ($num == 9) {
			$month = 'पौष';

		} elseif ($num == 10) {
			$month = 'माघ';

		} elseif ($num == 11) {
			$month = 'फाल्गुन';

		} elseif ($num == 12) {
			$month = 'चैत्र';
		}

		return $month;
	}

	if( !function_exists('getPreMonths')) {
		function getPreMonths($month)  {
			
			if($month == 4 ) {
				$preMonths = [0];
			} else if( $month == 5 ) {
				$preMonths = [4];
			} else if($month == 6 ){
				$preMonths = [4,5];
			}  else if($month == 7 ){
				$preMonths = [4,5,6];
			} else if($month == 8 ) {
				$preMonths = [4,5,6,7];
			} else if($month == 9 ) {
				$preMonths = [4,5,6,7,8];
			} else if($month == 10 ) {
				$preMonths = [4,5,6,7,8,9];
			} else if($month == 11 ) {
				$preMonths = [4,5,6,7,8,9,10];
			} else if($month == 12 ) {
				$preMonths = [4,5,6,7,8,9,10,11];
			} else if($month == 1 ) {
				$preMonths = [4,5,6,7,8,9,10,11,12];
			} else if($month == 2 ) {
				$preMonths = [4,5,6,7,8,9,10,11,12,1];
			} else if($month == 3 ) {
				$preMonths = [4,5,6,7,8,9,10,11,12,1,2];
			}
			return $preMonths;
		}
	}
}

if( !function_exists('extractDate')) {
	function extractDate($timestamp) {
		$newdate = explode(' ', $timestamp);
		return $newdate[0];
	}
}