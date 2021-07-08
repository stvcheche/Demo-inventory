<?php

/* Turn off error reporting */
error_reporting(0);

$maxval = 0;
$low_limit = 0;
$upp_limit = 0;
$nada = "nada";
$indcz = 3;
$action = "";

if ($vexac == "Active") {
    $action = "Depreciate";
} else if ($vexac == "Depreciated") {
    $action = "Activate";
}

/* Back to all users */
if ($determ === "invntBacksingusr") {

    $tbHeaders = [];

    array_push($tbHeaders, "ID");
    array_push($tbHeaders, "Product");
    array_push($tbHeaders, "Price");
    array_push($tbHeaders, "Reorder level");
    array_push($tbHeaders, "Reorder quantity");
    array_push($tbHeaders, "Action");

    $dimens = "col-span-4_3";

    if (sizeof($zhunga) > 0) {
	 $maxval = $zhunga[0];
	 $low_limit = $zhunga[1];
	 $upp_limit = $zhunga[2];
    }

    $idesup = "idesuo0";

    $ghsra = "updatGen";
    $var_a = "../Logic/navigation.php";
    $var_b = "mnex";
    $var_bb = "mnexa";
    $var_bc = "mnexb";
    $var_c = "inventupdate";

    echo'
<div class="' . $dimens . '">
    <table class="tablempr">
        <tr>';
    for ($dec = 0; $dec < sizeof($tbHeaders); $dec++) {
	 echo'   <th class="thempr" onclick="inventBkusr(\'' . $mims . '\', \'' . $nada . '\', \'' . $dec . '\')">' . $tbHeaders[$dec] . '</th>';
    }
    echo'</tr>';

    for ($mk = $low_limit; $mk < $upp_limit; $mk++) {

	 echo'<tr>
	     <td id="' . $idesup . $mk . '" class="tdempr" style="width: ' . $tblwdth[0] . '%; text-align:center;">' . $usrVals[0][$mk] . '</td>';

	 for ($mka = 1; $mka < sizeof($usrVals); $mka++) {
	     echo'   <td id="' . $idesupb . $mka . $mk . '" class="tdempr" style="width: ' . $tblwdth[$mka] . '%; text-align:' . $txtalign[$mka] . ';" 
		  onkeyup="updatGen(\'' . $var_a . '\', \'' . $var_bb . '\', \'' . $var_c . '\', \'' . $mims . '\', this.id, \'' . $usrVals[0][$mk] . '\');"
		       onclick="admMkedit(this.id);">' . $usrVals[$mka][$mk] . '</td>';
	 }

	 echo'    <td class="tdempr" style="width: ' . $tblwdth[4] . '%">                 
		  <input id="' . $usrVals[0][$mk] . '" onclick="orDispactdiact(\'' . $action . '\', \'' . $mims . '\', this.id);" class="detaibnt" type="button" value="' . $action . '">
	     </td>
	 </tr>';
    }
    echo'

    </table>
    <input type="hidden" id="inventcntbn" value="' . $maxval . '">
</div>';
}

