<?php

/* Turn off error reporting */
error_reporting(0);

include($_SERVER["DOCUMENT_ROOT"] . "/Resources/resources.php");

$determ = filter_input(INPUT_POST, "determ");

switch ($determ) {

    case"loadmain": {

	     include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Home/navhome.php");

	     break;
	 }

    case"invenTools":
    case"invenToolsa":
    case"invenToolsb":
    case"invenToolsc": {

	     include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Home/homeresocs.php");

	     break;
	 }

    case "invntBacksingusr": {
	     $dimet = filter_input(INPUT_POST, "dimet");
	     $dimeta = filter_input(INPUT_POST, "dimeta");
	     $vexac = filter_input(INPUT_POST, "vexac");

	     $mims = filter_input(INPUT_POST, "mims");
	     $srches = filter_input(INPUT_POST, "srches");
	     $srtId = filter_input(INPUT_POST, "srtId");

	     $pagval = filter_input(INPUT_POST, "pagval");
	     $width = filter_input(INPUT_POST, "width");
	     $height = filter_input(INPUT_POST, "height");

	     $frodta = filter_input(INPUT_POST, "frodta");
	     $todta = filter_input(INPUT_POST, "todta");

	     include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Home/homeresocs.php");
	     break;
	 }

    case "newRecord": {
	     $idex = filter_input(INPUT_POST, "dimet");
	     $mims = filter_input(INPUT_POST, "mims");

	     include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Home/homeresocs.php");
	     break;
	 }

    case "invsavrecode": {
	     $predata = json_decode(stripslashes(filter_input(INPUT_POST, 'dta')));
	     $mims = filter_input(INPUT_POST, "destored");
	     $shopstrn = filter_input(INPUT_POST, "shopstr");

	     include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Home/homeresocs.php");
	     break;
	 }

    case "invntupdcount": {
	     $mims = filter_input(INPUT_POST, "mims");

	     include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Home/homeresocs.php");
	     break;
	 }

    case "inventupdate": {
	     $ident = filter_input(INPUT_POST, "ida");
	     $dtata = filter_input(INPUT_POST, "dta");
	     $dimeta = filter_input(INPUT_POST, "dimeta");

	     $rowec = filter_input(INPUT_POST, "rowex");
	     include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Home/homeresocs.php");
	     break;
	 }

    case "globGhestas": {
	     $valec = filter_input(INPUT_POST, "valec");
	     $dimet = filter_input(INPUT_POST, "dimet");
	     $musis = filter_input(INPUT_POST, "musis");
	     $zims = filter_input(INPUT_POST, "zims");
	     $paramt = caddy(filter_input(INPUT_POST, "paramt"));

	     include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Resources/resources.php");
	     break;
	 }

    case "invordispatch": {
	     $mims = filter_input(INPUT_POST, "mims");
	     $mimsa = filter_input(INPUT_POST, "mimsa");
	     $mimsb = filter_input(INPUT_POST, "mimsb");

	     include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Home/homeresocs.php");
	     break;
	 }


    default :
	 break;
}

