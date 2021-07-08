<?php

/* Turn off error reporting */
error_reporting(0);

$maxval = 0;
$low_limit = 0;
$upp_limit = 0;
$nada = "nada";
$indcz = 3;
$uniqidec = "";

/* Back to all users */
if ($determ === "invntBacksingusr") {

    $tbHeaders = [];

    array_push($tbHeaders, "Product");
    array_push($tbHeaders, "Sales");
    array_push($tbHeaders, "Stock balances");
    array_push($tbHeaders, "Reorder level");

    $dimens = "col-span-4_3";
    $indcz = 6;
    $uniqidec = "6";

    if (sizeof($zhunga) > 0) {
	 $maxval = $zhunga[0];
	 $low_limit = $zhunga[1];
	 $upp_limit = $zhunga[2];
    }


    echo'
<div class="' . $dimens . '">
    <table class="tablempr">
        <tr>';
    for ($dec = 0; $dec < sizeof($tbHeaders); $dec++) {
	 echo'   <th class="thempr" onclick="inventBkusr(\'' . $mims . '\', \'' . $nada . '\', \'' . $dec . '\')">' . $tbHeaders[$dec] . '</th>';
    }
    echo'</tr>';

    for ($mk = $low_limit; $mk < $upp_limit; $mk++) {
	 echo'<tr>';
	 for ($mka = 0; $mka < sizeof($usrVals); $mka++) {
	     echo'   <td class="tdempr" style="width: ' . $tblwdth[$mka] . '%; text-align:' . $txtalign[$mka] . ';">' . $usrVals[$mka][$mk] . '</td>';
	 }
	 echo'</tr>';
    }
    echo'
	 
    </table>
    <input type="hidden" id="inventcntbn" value="' . $maxval . '">
</div>';
}

