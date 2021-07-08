<?php

/* Turn off error reporting */
error_reporting(0);

$adghareti = "inventxint";

$adidema = array("invent_navew", "invent_navewa", "invent_navewb", "invent_navewc");
$adtrly = array("Stock balances", "Inventory", "Sales", "Products");
$adpicas = array("invent.png", "inventa.png", "sales.png", "priceslist.png");

echo'<div class="col-span-4_4">

    <div class="wrapper">  
        <div class="row">         

            <div class="col-span-4_4">
                <div class="adnavcont">';
for ($res = 0; $res < sizeof($adidema); $res++) {
    echo'               <div class="adnavbtn" id="' . $adidema[$res] . '" onclick="hometabMng(this.id);">
                        <img src="/Graphics/' . $adpicas[$res] . '" alt="cool" style="width:33px; height:33px;">
                        <div class="tabsttle">' . $adtrly[$res] . '</div>
                    </div>';
}
echo'           </div>             
            </div>


            <input type="hidden" id="' . $adghareti . '">

            <br> 
            <div id="skopsGasca"></div>          

        </div>          
    </div>  

</div>';

