<?php

/* Turn off error reporting */
error_reporting(0);

$rea = "reacesd";
$thtng = "No matches found";
$Idecs = $dimet . "globFlux";
$Idecas = $dimet . "globPence";

echo '
<div id="' . $Idecs . '" class="hifg"> 
    <div id="' . $Idecas . '" class="hifga">';
if (sizeof($unidtb) > 0) {

    for ($suxc = 0; $suxc < sizeof($unidtb); $suxc++) {
	 echo ' 
        <input id="' . $dimet . $suxc . '" value="' . $unidtb[$suxc] . '" onmouseover="bigvai(this.id);" 
           onmouseout="bigvaia(this.id);" class="voli" 
           onclick="' . $fncv . '(this.id, \'' . $dimet . '\', \'' . $zims . '\', \'' . $musis . '\', \'' . $paramt . '\');" readonly>';
    }
} else if (sizeof($unidtb) < 1) {
    echo '      
    <input  id="' . $dimet . $rea . '" value="' . $thtng . '" onmouseover="bigvai(this.id);" 
            onmouseout="bigvaia(this.id);" onclick="hidasrch();" class="voli" readonly>';
}
echo '  
    </div>
    <button class="srch_clbtn" onclick="hidasrch();">
        <img onmousedown="outKeyUp(event);" class="srchclose"  src="/Graphics/close.png" alt="">
    </button>
</div>';
