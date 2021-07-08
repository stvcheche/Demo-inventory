<?php

/* Turn off error reporting */
error_reporting(0);

$mk = "tp";
$mks = "ly";
$idmod = $idex . $mk;
$idmoda = $idex . $mks;

$EntryTtle = array("Product", "Price", "Quantity");
$EntryId = array("saleprdctidec", "saleprccidec", "saleqntyidec");

echo'<div id="' . $idmod . '" class="mssgtop"></div>
<div id="' . $idmoda . '" class="Overlaya">
    <div>
        <div id=Dlgheader class=cuul>New product</div>
        <div id=DlgContent class=cuula>
	     <!--Product-->
	     <div>
		  <div class="usr_lbl">' . $EntryTtle[0] . ' </div>
		  <select id="' . $EntryId[0] . '"  class="usr_inpta" onchange="setPrice(this.value);">
		      <option value="deflt">Select product</option>';

for ($ke = 0; $ke < sizeof($products[0]); $ke++) {
    echo'       <option value="' . $products[0][$ke] . "#" . $products[2][$ke] . '">' . $products[1][$ke] . '</option>';
}
echo' </select>
	     </div> 
	     <br><br><br> 

	     <!--Price-->
	     <div>
		  <div class="usr_lbl">' . $EntryTtle[1] . ' </div>
		  <input id="' . $EntryId[1] . '"  type="number" class="usr_inp">
	     </div> 
	     <br><br><br> 

	     <!--Quantity-->
	     <div>
		  <div class="usr_lbl">' . $EntryTtle[2] . ' </div>
		  <input id="' . $EntryId[2] . '"  type="number" class="usr_inp">
	     </div> 
	     <br><br><br><br> 

	     <div class = "popdoprnt" id = "savemultido"></div>
	     <br> 
	 </div>



        <input type="button" class="mssg_inbtn" value="Save" onclick="prinventSaverecod(\'' . $mims . '\', \'' . $idex . '\')">
	 <input type="button" class="mssg_inbtn" value="Cancel" onclick="removepopup(\'' . $idex . '\')">
    </div>
</div>';

