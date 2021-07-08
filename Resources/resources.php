<?php

/* Turn off error reporting */
error_reporting(0);

function diMetric($width, $height) {
    $lggico = 0;
    $padtop = 0;
    $padleft = 0;
    $padtopdr = 0;
    $padleftdr = 0;
    $hpgico = 0;
    $footico = 0;
    $fonsuv = 0;
    $hpdicosp = 0;
    $islaz = 0;
    $appsdec = 0;

    $area = $width * $height;

    if ($area <= 304804.0) {
	 $lggico = 70;
	 $padtop = 4;
	 $padleft = 6;
	 $padtopdr = 4;
	 $padleftdr = 10;
	 $hpgico = 45;
	 $footico = 42;
	 $fonsuv = 0.9;
	 $hpdicosp = 0;
	 $islaz = "phone";
	 $appsdec = 1.0;
    } else if (304804.0 < $area && $area <= 786532.0) {
	 $lggico = 78;
	 $padtop = 8;
	 $padleft = 10;
	 $padtopdr = 8;
	 $padleftdr = 14;
	 $hpgico = 53;
	 $footico = 50;
	 $fonsuv = 1.0;
	 $hpdicosp = 10;
	 $islaz = "tablet";
	 $appsdec = 1.2;
    } else if ($area > 786532.0) {
	 $lggico = 70;
	 $padtop = 4;
	 $padleft = 6;
	 $padtopdr = 4;
	 $padleftdr = 10;
	 $hpgico = 45;
	 $footico = 42;
	 $fonsuv = 0.9;
	 $hpdicosp = 10;
	 $islaz = "computer";
	 $appsdec = 1.0;
    }

    $dimetic = array($lggico, $padtop, $padleft, $padtopdr, $padleftdr, $hpgico,
	 $footico, $fonsuv, $hpdicosp, $islaz, $appsdec);

    return $dimetic;
}

/* Get dates */

function dateGtprev() {
    $bacura = [];
    date_default_timezone_set('Africa/Nairobi');
    $curdate = date('F, Y');

    $lstOnemonths = '01-' . date('F-Y', strtotime("-1 month"));

    $lstSixmonths = '01-' . date('F-Y', strtotime("-6 month"));

    $lstFourmonths = '01-' . date('F-Y', strtotime("-4 month"));

    $dfstcurmonth = '01-' . date("F-Y", strtotime($curdate));

    $dcurrcurmonth = date("d-F-Y", strtotime($curdate));

    $dlastcurmonth = date("t-F-Y", strtotime($curdate));

    $dcurrcurmontha = date("Y-m-d", strtotime($curdate));

    $currtime = date("h:i:s");

    $currtima = date("H:i:s");

    array_push($bacura, $dfstcurmonth, $dcurrcurmonth, $dlastcurmonth, $lstOnemonths, $lstSixmonths, $dcurrcurmontha, $currtime, $lstFourmonths, $currtima);

    return $bacura;
}

/* Get page limits */

function gtPagest($marray, $range, $positin) {
    $retpager = [];

    $juiler = sizeof($marray) / $range;
    $temp = floor($juiler);
    $juilera = intval($temp);
    $juilerb = null;

    if ($juiler > $juilera) {
	 $juilerb = $juilera + 1;
    } else if ($juiler == doubleval($juilera)) {
	 $juilerb = $juilera;
    }

    $milka = $juilerb - 1;
    $low_limit = 0;
    $upp_limit = 0;

    if ($positin < $milka) {
	 $low_limit = $positin * $range;
	 $upp_limit = $low_limit + $range;
    } else {
	 $low_limit = $positin * $range;
	 $upp_limit = sizeof($marray);
    }

    array_push($retpager, $juilerb);
    array_push($retpager, $low_limit);
    array_push($retpager, $upp_limit);

    return $retpager;
}

/* Array multi-sort */

function advarrSort($idec, $combisto) {
    if ($idec < sizeof($combisto)) {

	 $detocs = $combisto[$idec];
	 array_unshift($combisto, $detocs);
	 $doscose = sizeof($combisto);

	 if (sizeof($combisto[0]) > 0) {
	     switch ($doscose) {

		  case 1: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE);

			   break;
		      }

		  case 2: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1]);

			   break;
		      }

		  case 3: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2]);

			   break;
		      }

		  case 4: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2], $combisto[3]);

			   break;
		      }

		  case 5: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2], $combisto[3], $combisto[4]);

			   break;
		      }

		  case 6: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2], $combisto[3], $combisto[4], $combisto[5]);

			   break;
		      }

		  case 7: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2], $combisto[3], $combisto[4], $combisto[5], $combisto[6]);

			   break;
		      }

		  case 8: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2], $combisto[3], $combisto[4], $combisto[5], $combisto[6], $combisto[7]);

			   break;
		      }

		  case 9: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2], $combisto[3], $combisto[4], $combisto[5], $combisto[6], $combisto[7], $combisto[8]);

			   break;
		      }

		  case 10: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2], $combisto[3], $combisto[4], $combisto[5], $combisto[6], $combisto[7], $combisto[8], $combisto[9]);

			   break;
		      }

		  case 11: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2], $combisto[3], $combisto[4], $combisto[5], $combisto[6], $combisto[7], $combisto[8], $combisto[9], $combisto[10]);

			   break;
		      }

		  case 12: {
			   array_multisort($combisto[0], SORT_NATURAL | SORT_FLAG_CASE, $combisto[1], $combisto[2], $combisto[3], $combisto[4], $combisto[5], $combisto[6], $combisto[7], $combisto[8], $combisto[9], $combisto[10], $combisto[11]);

			   break;
		      }

		  default:
		      break;
	     }

	     array_shift($combisto);
	 }
    }

    return $combisto;
}

function gtDflip($dta) {
    $dtaflip = date("Y-m-d", strtotime($dta));

    return $dtaflip;
}

function gtDpresocs($dta) {
    $dtaflip = date("d-F-Y", strtotime($dta));

    return $dtaflip;
}

function caddy($valecs) {
    $valecsmod = base64_decode($valecs);
    $valecsmoda = urldecode($valecsmod);
    $valecsmodb = strip_tags($valecsmoda);
    $valecsmodc = preg_replace('/&nbsp;/', " ", $valecsmodb);

    return $valecsmodc;
}

function naddy($valecs) {
    $valecsmod = base64_decode($valecs);
    $valecsmoda = urldecode($valecsmod);
    $valecsmodb = strip_tags($valecsmoda, "<br>");
    $valecsmodc = preg_replace('/^(<br\s*\/?>)*|(<br\s*\/?>)*$/i', '', $valecsmodb);

    return $valecsmodc;
}

function paddy($valecs) {
    $retval = 0;

    $valecsmod = base64_decode($valecs);
    $valecsmoda = urldecode($valecsmod);
    $valecsmodb = strip_tags($valecsmoda);
    $valecsmodc = preg_replace("/[^0-9]/", "", $valecsmodb);

    if ($valecsmodc !== "") {
	 $retval = $valecsmodc;
    }

    return $retval;
}

function gtTimestamp() {
    date_default_timezone_set('Africa/Nairobi');
    $deltino = date_create();
    $timestamp = date_timestamp_get($deltino);

    return $timestamp;
}
