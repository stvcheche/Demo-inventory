<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dtprxidenty = filter_input(INPUT_POST, "dimetb");
$dtprxtoup = filter_input(INPUT_POST, "dimetc");
$dtprxtouq = filter_input(INPUT_POST, "dimetd");
$paramt = filter_input(INPUT_POST, "paramt");
$modeca  = retuxDates();


$duc = "dpk";
$duca = "slcyt";
$duce = "val";
$ducf = "vala";
$ducg = "valb";
$duck = "cancl";

echo"     <div class=col-span-4_4> 
          <div class=pkr_ghatr id=".$dtprxidenty.$duc.">
          <div class=row>   
          
             <div class=col-span-4_4>
                 <button id=".$dtprxidenty.$duca." class=pkr_hdre 
                         onclick=pkr_firefnc('".$dtprxidenty."','".$dtprxtoup."','".$dtprxtouq."','".$paramt."');>Select</button>
             </div>
              
             <div class=col-span-4_4>
                 <button onclick=dtaPlus('".$dtprxidenty."'); class=pkr_slct>&#9650;</button>
                 <button onclick=mthPlus('".$dtprxidenty."'); class=pkr_slcta>&#9650;</button>
                 <button onclick=yerPlus('".$dtprxidenty."'); class=pkr_slcta>&#9650;</button>
             </div>
              
             <div class=col-span-4_4>
                 <button id=".$dtprxidenty.$duce." class=pkrdt_slct>".$modeca[0]."</button>
                 <button id=".$dtprxidenty.$ducf." class=pkrdt_slcta>".$modeca[1]."</button>
                 <button id=".$dtprxidenty.$ducg." class=pkrdt_slcta>".$modeca[2]."</button>
             </div>
              
             <div class=col-span-4_4>
                 <button onclick=dtaMlus('".$dtprxidenty."'); class=pkr_slct>&#9660;</button>
                 <button onclick=mthMlus('".$dtprxidenty."'); class=pkr_slcta>&#9660;</button>
                 <button onclick=yerMlus('".$dtprxidenty."'); class=pkr_slcta>&#9660;</button> 
             </div>
              
             <div class=col-span-4_4>
                 <button class=pkr_hdri onclick=clozdtpckr('".$dtprxidenty."');>Cancel</button>
             </div>
              
          </div>
     </div>";

//Get dates
function retuxDates() {
    $dates = [];

    /* Last date of the month */
    $gdta = '' . date('Y-m-d');
    $dtmt = date_create($gdta);
    $day = $dtmt->format('d');
    $month = $dtmt->format('F');
    $year = $dtmt->format('Y');

    $dates[0] = $day;
    $dates[1] = $month;
    $dates[2] = $year;

    return $dates;
}

