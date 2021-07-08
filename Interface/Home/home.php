<?php

/* Turn off error reporting */
error_reporting(0);

include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Resources/globsearch.php");

$display = "hidden";
$hdisplay = "none";
$hdisplaya = "none";
$mdisplay = "none";

$hdisplayb = "none";
$scropu = "nada";
$colspan = "col-span-4_1";
$colspana = "col-span-4_1";

$manka = "";
$manke = "";

/* Get all user details */
$ttlmn = null;
$ttla = null;
$ttlb = null;
$ttlc = "";
$xsum = "skopswksop";
$dateSuprefnc = "dateSuprefnc";

$salesfro = "salesfro";
$salesto = "salesto";

switch ($determ) {

    case"invenTools": {
	     $ttlc = "NA";

	     $ttlmn = "Total stocks";
	     $ttla = "Well stocked";
	     $ttlb = "Under stocked";

	     break;
	 }


    case"invenToolsa": {
	     $ttlc = "NA";

	     $ttlmn = "Total stocks";
	     $ttla = "Well stocked";
	     $ttlb = "Under stocked";

	     $mdisplay = "inline";
	     $hdisplayb = "inline";

	     $manka = "Pending reorders";
	     $manke = "Dispatched reorders";

	     $colspan = "col-span-4_06";
	     $colspana = "col-span-4_06";

	     break;
	 }

    case"invenToolsb": {
	     $ttlc = "New sale";

	     $ttlmn = "Total sales";
	     $ttla = "Active";
	     $ttlb = "Deleted";

	     $hdisplay = "inline";
	     $hdisplayb = "inline";

	     $colspan = "col-span-4_06";
	     $colspana = "col-span-4_06";

	     break;
	 }

    case"invenToolsc": {
	     $ttlc = "New product";

	     $ttlmn = "Total products";
	     $ttla = "Active";
	     $ttlb = "Depreciated";

	     $hdisplay = "inline";
	     $hdisplaya = "inline";

	     break;
	 }

    default :
	 break;
}


echo'
<br><br>
<div class="adCovex">
    <div class="row">
        <div class="col-span-4_25">
            <div class="fonintro">' . $ttlmn . '&nbsp;&nbsp; <span class="fonintro" id="sumSkops">' . $counte[0] . '</span></div>
        </div>

        <div class="col-span-4_25">
            <div class="spoximag">
                <div class="foninvro">' . $ttla . ' &nbsp;&nbsp;<span id="acti_skops">' . $counte[1] . '</span></div> 

            </div>
        </div>

        <div class="col-span-4_25">
            <div class="spoximag">
                <div class="foninvro">' . $ttlb . ' &nbsp;&nbsp;<span id="inacti_skops">' . $counte[2] . '</span></div>

            </div>
        </div>

    </div>
</div>
<br>

<div class="adCovexa">
    <div class="haghepa">
        <div class="row">
            <div class="' . $colspan . '" Style="display: ' . $hdisplay . '">
                <div class="midusoma">
                    <button onclick="inventnewrecd(\'' . $determ . '\');" class="btnswre" Style="padding-top:' . $btpdtp . 'px; 
                            padding-bottom:' . $btpdtp . 'px; padding-left:' . $btpdlft . 'px;">' . $ttlc . '</button>

                </div>
            </div>

	     <div class="col-span-4_1" Style="display: ' . $mdisplay . '">
                <div class="midusoma">
                    <button id="mankaidec" onclick="inventrySwich(this.id, \'' . $determ . '\');" 
                            class="acntbtnc" Style="padding-top:' . $btpdtp . 'px; padding-bottom:' . $btpdtp . 'px; padding-left:' . $btpdlft . 'px;" >' . $manka . '</button><!-- 
                    --><button id="mankaideca" onclick="inventrySwich(this.id, \'' . $determ . '\');" 
                               class="acntbtncb" Style="padding-top:' . $btpdtp . 'px; padding-bottom:' . $btpdtp . 'px; padding-left:' . $btpdlft . 'px;">' . $manke . '</button>
                    <input id="invntSwtchinpt" type="text" style="display: none;" value="Pending">
                </div>
            </div>

            <div class="col-span-4_1" Style="display: ' . $hdisplaya . '">
                <div class="wizacd">
                    <input id="skopfasad" type="button" class="mizacd" value="Active" onclick="invSwitch(this.id, \'' . $determ . '\')" 
                           Style="padding-top:' . $btpdtp . 'px; padding-bottom:' . $btpdtp . 'px; padding-left:' . $btpdlft . 'px;">

                    <input id="skopvasad" type="button" class="mizacd" value="Inactive" onclick="invSwitch(this.id, \'' . $determ . '\')"
                           Style="padding-top:' . $btpdtp . 'px; padding-bottom:' . $btpdtp . 'px; padding-left:' . $btpdlft . 'px;">
                </div>
                <input id="inventstevacq" type="hidden" value="Active">
            </div>


	     <div class="col-span-4_06" Style="display: ' . $hdisplayb . '"> 
                <div class="midusoma"> 
                    <button id="' . $salesfro . '" style="padding-top:' . $btpdtp . 'px; padding-left:' . $btpdlft . 'px;" class="flotacntdate" 
                            onclick="pkr_pickajhda(\'' . $salesfro . '\', \'' . $dateSuprefnc . '\', event, \'' . $determ . '\')">' . $ordesDates[0] . '</button>
                </div>
            </div>

            <div class="col-span-4_06" Style="display: ' . $hdisplayb . '">
                <div class="midusoma">
                    <button id="' . $salesto . '" style="padding-top:' . $btpdtp . 'px; padding-left:' . $btpdlft . 'px;" class="flotacntdate" 
                            onclick="pkr_pickajhda(\'' . $salesto . '\', \'' . $dateSuprefnc . '\', event, \'' . $determ . '\')">' . $ordesDates[2] . '</button>
                </div>
            </div>

            <div class="' . $colspana . '">
                <div class="searizacd">
                    <input type="text" class="advsearch" placeholder="Search"  
		      onkeyup="inventBkusr(\'' . $determ . '\',this.value,  \'' . $scropu . '\');" id="' . $dimeta . $xsum . '">

                </div>
            </div>

            <div class="' . $colspana . '" id="invnt_pager" style="visibility:' . $display . '">
                <div class="nav_accl">
                    <button class="navbf_acc" id="invnt_fbtn" onclick="pageNavigation(this.id, \'' . $determ . '\');">&#9668;</button><!-- 
                    --><button class="navbf_acca" id="invnt_nbtn">0</button><!-- 
                    --><button class="navbf_accb" id="invnt_tbtn" onclick="pageNavigation(this.id, \'' . $determ . '\');">&#9658;</button>
                    <input type="hidden" id="invnt_navsrt" value="200">
		      
                </div>&nbsp; out of
                <span id="salesPgindica"></span>
            </div>

        </div>   
    </div>

    <div id="inventbackusr" class="spiceric">          
    </div>  
    <br>

</div>
<br><br>';
