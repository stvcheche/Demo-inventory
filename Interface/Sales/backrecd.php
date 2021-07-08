<?php

/* Turn off error reporting */
error_reporting(0);

$maxval = 0;
$low_limit = 0;
$upp_limit = 0;
$nada = "nada";
$indcz = 3;
$action = "";

if ($dimeta == "Pending") {
    $action = "dispatch";
} else if ($dimeta == "Dispatched") {
    $action = "reverse";
}

/* Back to all users */
if ($determ === "invntBacksingusr") {

    $tbHeaders = [];

    array_push($tbHeaders, "ID");
    array_push($tbHeaders, "Date");
    array_push($tbHeaders, "Product");
    array_push($tbHeaders, "Price");
    array_push($tbHeaders, "Quantity");

    $dimens = "col-span-4_3";

    if (sizeof($zhunga) > 0) {
	 $maxval = $zhunga[0];
	 $low_limit = $zhunga[1];
	 $upp_limit = $zhunga[2];
    }

    $idesup = "idesuo0";
    $idesupa = "idesuo1";
    $idesupc = "idesuo2";

    $ghsra = "updatGen";
    $var_a = "../Logic/navigation.php";
    $var_b = "mnex";
    $var_bb = "mnexa";
    $var_bc = "mnexb";
    $var_c = "inventupdate";

    $nuzes = 15;
    $usrsrch = "inventprdsearch";

    echo'
<div class="' . $dimens . '">
    <table class="tablempr">
        <tr>';
    for ($dec = 0; $dec < sizeof($tbHeaders); $dec++) {
	 echo'   <th class="thempr" onclick="inventBkusr(\'' . $mims . '\', \'' . $nada . '\', \'' . $dec . '\')">' . $tbHeaders[$dec] . '</th>';
    }
    echo'</tr>';

    for ($mk = $low_limit; $mk < $upp_limit; $mk++) {
	 $destcplstr = $var_a . "," . $var_bb . "," . $var_c . "," . $mims . "," . $idesupa . $mk . "," . $usrVals[0][$mk];
	 $destcplstra = $var_a . "," . $var_bc . "," . $var_c . "," . $mims . "," . $idesupc . $mk . "," . $usrVals[0][$mk];

	 echo'<tr>
	     <td id="' . $idesup . $mk . '" class="tdempr" style="width: ' . $tblwdth[0] . '%; text-align:center;">' . $usrVals[0][$mk] . '</td>

	     <td id="' . $idesupa . $mk . '" class="tdempr" style="width: ' . $tblwdth[1] . '%; text-align:center;" 
		  onclick="pkr_pickajhda(this.id, \'' . $ghsra . '\', event, \'' . $destcplstr . '\')">' . $usrVals[1][$mk] . '</td>

	     <td class="tdempr" style="width: ' . $tblwdth[2] . '%; text-align:left;">
                    <input id="' . $idesupc . $mk . '" type="text" value="' . $usrVals[2][$mk] . '" 
                       class="alSrchdisp" onkeyup="globSrchup(this.id, \'' . $dimeta . '\', \'' . $usrsrch . '\', \'' . $nuzes . '\', \'' . $destcplstra . '\')"
                       onclick="admMkedita(this.id);" readonly></td>';

	 for ($mka = 3; $mka < sizeof($usrVals); $mka++) {
	     echo'   <td id="' . $idesupb . $mka . $mk . '" class="tdempr" style="width: ' . $tblwdth[$mka] . '%; text-align:' . $txtalign[$mka] . ';" 
		  onkeyup="updatGen(\'' . $var_a . '\', \'' . $var_bb . '\', \'' . $var_c . '\', \'' . $mims . '\', this.id, \'' . $usrVals[0][$mk] . '\');"
		       onclick="admMkedit(this.id);">' . $usrVals[$mka][$mk] . '</td>';
	 }

	 echo'    </tr>';
    }
    echo'

    </table>
    <input type="hidden" id="inventcntbn" value="' . $maxval . '">
</div>';
}

