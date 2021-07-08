<?php

/* Turn off error reporting */
error_reporting(0);

include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Home/homelogics.php");
include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Inventory/inventorylogics.php");
include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Sales/saleslogics.php");
include($_SERVER["DOCUMENT_ROOT"] . "/Logic/Products/productlogics.php");

$range = 100;

switch ($determ) {

    case"invenTools":
    case"invenToolsa":
    case"invenToolsb":
    case"invenToolsc": {
	     $dimetic = diMetric($width, $height);
	     $ordesDates = dateGtprev();

	     $btpdtp = $dimetic[1];
	     $btpdlft = $dimetic[2];
	     $drpdtp = $dimetic[3];
	     $drpdlft = $dimetic[4];

	     $counte = [];

	     if ($determ === "invenTools" || $determ === "invenToolsa") {
		  $stkbalance = sktBalance();
		  $wellstks = wellStocked();
		  $understks = underStocked($determ);
		  $counte = array($stkbalance, $wellstks, $understks);
	     } else if ($determ === "invenToolsb") {
		  $totalSales = saleTotal();
		  $actiSales = adsaleTotal("Active");
		  $deletedsal = adsaleTotal("Deleted");
		  $counte = array($totalSales, $actiSales, $deletedsal);
	     } else if ($determ === "invenToolsc") {
		  $totalprdcts = productTotal();
		  $prdctactive = adproductTotal("Active");
		  $deltprdcts = adproductTotal("Depreciated");
		  $counte = array($totalprdcts, $prdctactive, $deltprdcts);
	     }


	     include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Home/home.php");

	     break;
	 }

    case "invntBacksingusr": {
	     $Sres = [];

	     $dbess = "";
	     $steta = "";
	     $prusrVals = [];
	     $tblwdth = [];
	     $txtalign = [];

	     switch ($mims) {

		  case "invenTools": {
			   array_push($Sres, "productname");
			   array_push($Sres, "salesttle");
			   array_push($Sres, "prdctreorderlvl");

			   $prusrVals = gtaStkbalances($Sres, $srches);
			   $tblwdth = array(30, 20, 20, 20);
			   $txtalign = array("left", "center", "center", "center");

			   break;
		      }

		  case "invenToolsa": {
			   array_push($Sres, "inventoryid");
			   array_push($Sres, "inventorydate");
			   array_push($Sres, "productname");
			   array_push($Sres, "inventoryquantity");

			   $prusrVals = gtaStkentry($dimeta, $Sres, $srches, $frodta, $todta);
			   $tblwdth = array(15, 30, 30, 15, 10);
			   $txtalign = array("center", "left", "left", "center");

			   break;
		      }

		  case "invenToolsb": {
			   array_push($Sres, "salesid");
			   array_push($Sres, "salesdate");
			   array_push($Sres, "productname");
			   array_push($Sres, "salesprice");
			   array_push($Sres, "salesquantity");

			   $prusrVals = gtaSales($Sres, $srches, $frodta, $todta);
			   $tblwdth = array(15, 25, 30, 15, 15);
			   $txtalign = array("center", "left", "left", "center", "center");

			   break;
		      }

		  case "invenToolsc": {
			   array_push($Sres, "productid");
			   array_push($Sres, "productname");
			   array_push($Sres, "productprice");
			   array_push($Sres, "prdctreorderlvl");
			   array_push($Sres, "prdctreorderqnty");

			   $prusrVals = gtaProducts($vexac, $Sres, $srches);
			   $tblwdth = array(15, 30, 20, 20, 15);
			   $txtalign = array("center", "left", "center", "center", "center");

			   break;
		      }

		  default :
		      break;
	     }


	     $zhunga = [];
	     $usrVals;

	     if (sizeof($prusrVals) > 0) {
		  $zhunga = gtPagest($prusrVals[0], $range, $pagval);
	     }

	     if ($srtId !== "nada" || $srtId === "") {
		  $usrVals = advarrSort($srtId, $prusrVals);
	     } else {
		  $usrVals = advarrSort(0, $prusrVals);
	     }


	     if ($mims === "invenTools") {
		  include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Inventory/backrecd.php");
	     } else if ($mims === "invenToolsa") {
		  include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Inventory/backrecda.php");
	     } else if ($mims === "invenToolsb") {
		  include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Sales/backrecd.php");
	     } else if ($mims === "invenToolsc") {
		  include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Product/backrecd.php");
	     }

	     break;
	 }

    case "newRecord": {
	     if ($mims === "invenToolsb") {
		  $products = alProducts();

		  include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Sales/newrecord.php");
	     } else if ($mims === "invenToolsc") {

		  include($_SERVER["DOCUMENT_ROOT"] . "/Interface/Product/newrecord.php");
	     }
	     break;
	 }

    case "invsavrecode": {
	     $micer = [];
	     $data = [];

	     $datemn = [];
	     $dbess = "";
	     $micermod = [];

	     for ($ger = 0; $ger < sizeof($predata); ++$ger) {
		  if ($mims === "invenToolsb") {
		      if ($ger !== 0) {
			   array_push($data, caddy($predata[$ger]));
		      } else {
			   array_push($data, caddy($predata[$ger]));
		      }
		  } else if ($mims === "invenToolsc") {
		      if ($ger !== 0) {
			   array_push($data, caddy($predata[$ger]));
		      } else {
			   array_push($data, caddy($predata[$ger]));
		      }
		  }
	     }

	     $pascode = $defaultpass;
	     $state = "Active";
	     $tmstomp = gtTimestamp();

	     switch ($mims) {
		  case "invenToolsb": {
			   $micermod = array(":var", ":vara", ":varb", ":varc", ":vard", ":vare");

			   $prdctarry = explode("#", $data[0]);
			   $data[0] = $prdctarry[0];

			   array_push($micer, "salesproduct");
			   array_push($micer, "salesprice");
			   array_push($micer, "salesquantity");

			   array_push($micer, "salesdate");
			   array_push($micer, "salesrecordcode");
			   array_push($micer, "salestatus");

			   $dbess = "sales";
			   $datearry = dateGtprev();

			   array_push($data, $datearry[5]);
			   array_push($data, "Sale" . $tmstomp . "RECODE");
			   array_push($data, $state);

			   break;
		      }

		  case "invenToolsc": {
			   $micermod = array(":var", ":vara", ":varb", ":varc", ":vard", ":vare", ":varf");

			   array_push($micer, "productname");
			   array_push($micer, "productprice");
			   array_push($micer, "prdctreorderlvl");
			   array_push($micer, "prdctreorderqnty");

			   array_push($micer, "productcode");
			   array_push($micer, "productrecordcode");
			   array_push($micer, "productstatus");

			   $dbess = "products";

			   array_push($data, "Product" . $tmstomp . "CODE");
			   array_push($data, "Product" . $tmstomp . "RECODE");
			   array_push($data, $state);

			   break;
		      }

		  default:
		      break;
	     }


	     $resp = svRecd($data, $dbess, $micer, $micermod);
	     echo $resp;

	     break;
	 }

    case"invntupdcount": {
	     $counte = [];

	     switch ($mims) {

		  case "invenToolsa": {
			   $stkbalance = sktBalance();
			   $wellstks = wellStocked();
			   $understks = underStocked($mims);
			   $counte = array($stkbalance, $wellstks, $understks);

			   break;
		      }

		  case "invenToolsb": {
			   $totalSales = saleTotal();
			   $actiSales = adsaleTotal("Active");
			   $deletedsal = adsaleTotal("Deleted");
			   $counte = array($totalSales, $actiSales, $deletedsal);

			   break;
		      }

		  case "invenToolsc": {
			   $totalprdcts = productTotal();
			   $prdctactive = adproductTotal("Active");
			   $deltprdcts = adproductTotal("Depreciated");
			   $counte = array($totalprdcts, $prdctactive, $deltprdcts);

			   break;
		      }

		  default:
		      break;
	     }

	     echo json_encode($counte);
	     break;
	 }

    case "inventupdate": {
	     $Sres = [];

	     $dbess = null;
	     $ridis = null;

	     switch ($dimeta) {
		  case "invenToolsa": {
			   $dbess = "inventory";
			   $ridis = "inventoryid";

			   array_push($Sres, "inventoryid");
			   array_push($Sres, "inventorydate");
			   array_push($Sres, "inventoryproduct");
			   array_push($Sres, "inventoryquantity");

			   break;
		      }

		  case "invenToolsb": {
			   $dbess = "sales";
			   $ridis = "salesid";

			   array_push($Sres, "salesid");
			   array_push($Sres, "salesdate");
			   array_push($Sres, "salesproduct");
			   array_push($Sres, "salesprice");
			   array_push($Sres, "salesquantity");

			   break;
		      }

		  case "invenToolsc": {
			   $dbess = "products";
			   $ridis = "productid";

			   array_push($Sres, "productid");
			   array_push($Sres, "productname");
			   array_push($Sres, "productprice");
			   array_push($Sres, "prdctreorderlvl");
			   array_push($Sres, "prdctreorderqnty");

			   break;
		      }

		  default:
		      break;
	     }

	     updatUsr($dbess, $ident, $dtata, $rowec, $ridis, $Sres);
	     break;
	 }

    case "invordispatch": {
	     $dbess = null;
	     $wstex = null;
	     $swec = null;
	     $szec = null;

	     switch ($mimsa) {
		  case "invenToolsa": {
			   $dbess = "inventory";
			   $swec = "inventorystatus";
			   $szec = "inventoryid";

			   switch ($mims) {
				case "Dispatch": {
					 $wstex = "Dispatched";
					 break;
				    }
				case "Reverse": {
					 $wstex = "Pending";
					 break;
				    }

				default:
				    break;
			   }
			   break;
		      }

		  case "invenToolsc": {
			   $dbess = "products";
			   $swec = "productstatus";
			   $szec = "productid";

			   switch ($mims) {
				case "Activate": {
					 $wstex = "Active";
					 break;
				    }
				case "Depreciate": {
					 $wstex = "Depreciated";
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


	     $mssg = actdeaShop($dbess, $swec, $wstex, $szec, $mimsb);
	     echo $mssg;

	     break;
	 }



    default :
	 break;
}

