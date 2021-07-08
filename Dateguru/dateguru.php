<?php

/* Turn off error reporting */
error_reporting(0);

$dtrvosqa = "dtrvosqa";
$yearvos = "yearvos";
$dtrvos = "dtrvos";
$dtoupdtval = "dtoupdtval";
$dtoupdtvalq = "dtoupdtvalq";
$duc = "dpk";
$duca = "mthbckwrd";
$ducb = "mthfwrd";
$ducc = "yrrbckwrd";
$ducd = "yrrforwrd";
$duce = "cloz";
$paramta = "paramt";
$misc = ",";

$dtpckercrrmnthn = rudighjko($dtpckeryear, $dtpckercrrmnth, 01);

$dtpkerdays = array("Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat");

$dtpkrkey = $dtpckercrrmnthn - 1;
$mnthdaysnum = date('t', mktime(0, 0, 0, $dtpckercrrmnthn, 1, $dtpckeryear));

$first_day_this_month = '' . date('' . $dtpckeryear . '-' . $dtpckercrrmnthn . '-01');
$sxudifg = date_create($first_day_this_month);
$dtpckerday = $sxudifg->format('D');

$rashdiva = array();
for ($rash = 1; $rash <= $mnthdaysnum; $rash++) {
array_push($rashdiva, $rash);
}
$digharty = null;
$gheyta = null;

if ($dtpckerday === "Mon") {
$digharty = 1;
} elseif ($dtpckerday === "Tue") {
$digharty = 2;
} elseif ($dtpckerday === "Wed") {
$digharty = 3;
} elseif ($dtpckerday === "Thu") {
$digharty = 4;
} elseif ($dtpckerday === "Fri") {
$digharty = 5;
} elseif ($dtpckerday === "Sat") {
$digharty = 6;
}

for ($rash = 0; $rash < $digharty; $rash++) {
array_unshift($rashdiva, "&#10052");
}


$rashdivb = array_chunk($rashdiva, 7);

if (sizeof($rashdivb[sizeof($rashdivb) - 1]) === 1) {
$gheyta = 6;
} elseif (sizeof($rashdivb[sizeof($rashdivb) - 1]) === 2) {
$gheyta = 5;
} elseif (sizeof($rashdivb[sizeof($rashdivb) - 1]) === 3) {
$gheyta = 4;
} elseif (sizeof($rashdivb[sizeof($rashdivb) - 1]) === 4) {
$gheyta = 3;
} elseif (sizeof($rashdivb[sizeof($rashdivb) - 1]) === 5) {
$gheyta = 2;
} elseif (sizeof($rashdivb[sizeof($rashdivb) - 1]) === 6) {
$gheyta = 1;
}

for ($nxa = 0; $nxa < $gheyta; $nxa++) {
array_push($rashdivb[sizeof($rashdivb) - 1], "&#10052");
}

function rudighjko($yr, $mth, $day) {
date_default_timezone_set('Africa/Nairobi');

$datess = '' . $yr . '-' . $mth . '-' . $day . '';
$tstdta = date_create($datess)->format('m');
return $tstdta;
}


echo'<div class="col-span-4_4">   
    <input type="hidden" id="'.$dtprxidenty.$misc.$paramta.'" value="'.$paramt.'">
    <div class="pkr_ghatr" id="'.$dtprxidenty.$duc.'" onmousedown="drag_init(event, this.id);" onmouseup="destroy(this.id);">
        <div class="row">   

            <div class="col-span-4_4"> 
                <div class="pkr_nxecar">
                    <span class="fgohikha">
                        <span id="'.$dtprxidenty.$misc.$duca.'" class="pkr_srcroll" onclick="pkr_dpkrfrrd(this.id);">&#9668;</span>
                        <span>
                            <input class="pkr_dtmnthchge" id="'.$dtprxidenty.$misc.$dtrvos.'" type="button" value="'.$dtpckercrrmnth.'">
                            <input id="'.$dtprxidenty.$misc.$dtrvosqa.'" type="hidden" value="'.$dtpkrkey.'">    
                        </span>
                        <span id="'.$dtprxidenty.$misc.$ducb.'" class="pkr_srcroll" onclick="pkr_dpkrfrrd(this.id);">&#9658;</span>
                    </span>

                    <span class="pkr_fgohikhb">
                        <span id="'.$dtprxidenty.$misc.$ducc.'" class="pkr_srcroll" onclick="pkr_yearpkrfrrd(this.id);">&#9668;</span>
                        <span>
                            <input class="pkr_dtmnthchge" id="'.$dtprxidenty.$misc.$yearvos.'" type="button" value="'.$dtpckeryear.'"> 
                            <input id="'.$dtprxidenty.$misc.$dtoupdtval.'" type="hidden" value="'.$dtprxtoup.'">  
                            <input id="'.$dtprxidenty.$misc.$dtoupdtvalq.'" type="hidden" value="'.$dtprxtouq.'">  
                        </span>
                        <span id="'.$dtprxidenty.$misc.$ducd.'" class="pkr_srcroll" onclick="pkr_yearpkrfrrd(this.id);">&#9658;</span>
                        <span id="'.$dtprxidenty.$misc.$duce.'" class="pkr_srcrolla" onclick="clozdtpckr(this.id);">  &#10006</span>    
                    </span>
                </div>
            </div>

            <div class="col-span-4_4">
                <div class="miya">'; 
                    for($direxo=0; $direxo<sizeof($dtpkerdays); $direxo++){ 
echo'                   <input type="button" class="pkr_dtpckerday" value="'.$dtpkerdays[$direxo].'">';

                        } 
echo'                   </div>
                        </div>

                        <div class="col-span-4_4">';
                            try{
                                
                            for($direx=0; $direx<sizeof($rashdivb); $direx++){  
echo'                           <div class="diya">'; 

                                   for($direxa=0; $direxa<sizeof($dtpkerdays); $direxa++){ 

echo'                                   <input onclick="pkr_assxevisto(this.id);" id="'.$dtprxidenty.$misc.$rashdivb[$direx][$direxa].'" 
                                           type="button" class="pkr_dtrypackar" value="'.$rashdivb[$direx][$direxa].'">';                   
                                         }  
echo'                                   </div> ';                    
                                       }  
                                        } catch (Exception $e) {
echo'                                   <div>'.$e.'</div>';

                                        }
echo'                           </div>

                        </div>       
                </div>
            </div>';



