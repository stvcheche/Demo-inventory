<?php

/* Turn off error reporting */
error_reporting(0);

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$determ = filter_input(INPUT_POST, "determ");

switch ($determ) {
    case "absolute": {
            $dtpckeryear = intval(filter_input(INPUT_POST, "dimet"));
            $dtpckercrrmnth = filter_input(INPUT_POST, "dimeta");
            $dtprxidenty = filter_input(INPUT_POST, "dimetb");
            $dtprxtoup = filter_input(INPUT_POST, "dimetc");
            $dtprxtouq = filter_input(INPUT_POST, "dimetd");
            $paramt = filter_input(INPUT_POST, "paramt");
            

            include($_SERVER["DOCUMENT_ROOT"] . "/Dateguru/dateguru.php");
            break;
        }

    case "inline": {

            include($_SERVER["DOCUMENT_ROOT"] . "/Dateguru/dateinline.php");
            break;
        }

    default :
        break;
}

