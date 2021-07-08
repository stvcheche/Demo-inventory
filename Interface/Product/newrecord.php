<?php

/* Turn off error reporting */
error_reporting(0);

$mk = "tp";
$mks = "ly";
$idmod = $idex . $mk;
$idmoda = $idex . $mks;

$EntryTtle = array("Product", "Price", "Reorder level", "Reorder quantity");
$EntryId = array("prdprdctidec", "prdprccdidec", "prdreorderlvlid", "prdreorderqntyid");

echo'<div id="' . $idmod . '" class="mssgtop"></div>
<div id="' . $idmoda . '" class="Overlaya">
    <div>
        <div id=Dlgheader class=cuul>New product</div>
        <div id=DlgContent class=cuula>

	     <!--Product-->
	     <div>
		  <div class="usr_lbl">' . $EntryTtle[0] . ' </div>
		  <input id="' . $EntryId[0] . '"  type="text" class="usr_inp">
	     </div> 
	     <br><br><br> 

	     <!--Price-->
	     <div>
		  <div class="usr_lbl">' . $EntryTtle[1] . ' </div>
		  <input id="' . $EntryId[1] . '"  type="number" class="usr_inp">
	     </div> 
	     <br><br><br> 

	     <!--Reorder level-->
	     <div>
		  <div class="usr_lbl">' . $EntryTtle[2] . ' </div>
		  <input id="' . $EntryId[2] . '"  type="number" class="usr_inp">
	     </div> 
	     <br><br><br> 

	     <!--Reorder quantity-->
	     <div>
		  <div class="usr_lbl">' . $EntryTtle[3] . ' </div>
		  <input id="' . $EntryId[3] . '"  type="number" class="usr_inp">
	     </div> 
	     <br><br><br><br> 
	      <div class = "popdoprnt" id = "savemultido"></div>
	      <br> 
	 </div>

	
        <input type="button" class="mssg_inbtn" value="Save" onclick="prinventSaverecod(\'' . $mims . '\', \'' . $idex . '\')">
	 <input type="button" class="mssg_inbtn" value="Cancel" onclick="removepopup(\'' . $idex . '\')">
    </div>
</div>';

