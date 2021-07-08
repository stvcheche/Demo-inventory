<?php

/* Turn off error reporting */
error_reporting(0);

include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Resources/reslogics.php");

switch ($determ) {

    case "globGhestas": {

	     $state = "Active";
	     $fncv = "wheel";
	     $unidtb = [];

	     switch ($musis) {

		  case "inventprdsearch": {
			   $unidtb = gtProducts($valec);
			   $fncv = "invprdrchUpdatrecd";

			   include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Resources/search.php");
			   break;
		      }


		  case "prdctupSrch": {
			   $state = "Active";
			   $varec = explode(",", $paramt);
			   $vareca = explode("#E#", $paramt);
			   array_pop($vareca);

			   $paramt = implode(",", $vareca);

			   $unidtb = gtProductsa($valec, $varec[6]);
			   $fncv = "odsrchclntupdat";

			   include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Resources/search.php");
			   break;
		      }

		  default:
		      break;
	     }

	     break;
	 }


    default:
	 break;
}