<?php

/* Turn off error reporting */
error_reporting(0);

/* Stock balances */

function sktBalance() {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $state = "Dispatched";
    $steta = "Active";

    $sql = "SELECT *, SUM(inventoryquantity) AS stoksttle FROM inventory webb LEFT JOIN "
	     . "(SELECT *, SUM(salesquantity) AS salesttle FROM sales WHERE salestatus=:stecsa) webba "
	     . "ON webb.inventoryproduct = webba.salesproduct WHERE inventorystatus=:stecs";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':stecs' => $state, ':stecsa' => $steta));

    $row = $resultp->fetch(PDO::FETCH_ASSOC);
    $stkbalance = number_format(intval($row['stoksttle']) - intval($row['salesttle']));

    return $stkbalance;
}

/* Well stocked */

function wellStocked() {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $state = "Dispatched";
    $steta = "Active";

    $sql = "SELECT * FROM products gebb LEFT JOIN "
	     . "(SELECT *, SUM(inventoryquantity) AS stoksttle FROM inventory webb LEFT JOIN "
	     . "(SELECT *, SUM(salesquantity) AS salesttle FROM sales WHERE salestatus=:stecsa GROUP BY salesproduct) webba "
	     . "ON webb.inventoryproduct = webba.salesproduct WHERE inventorystatus=:stecs GROUP BY webb.inventoryproduct) gebba "
	     . "ON gebb.productcode=gebba.inventoryproduct";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':stecs' => $state, ':stecsa' => $steta));

    $count = 0;

    while ($row = $resultp->fetch(PDO::FETCH_ASSOC)) {
	 $stkstate = (intval($row["stoksttle"]) - intval($row["salesttle"]) ) - intval($row["prdctreorderlvl"]);

	 if ($stkstate >= 0) {
	     ++$count;
	 }
    }

    return $count;
}

/* Under stocked */

function underStocked($mims) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $state = "Dispatched";
    $steta = "Active";
    $lowstocked = [];

    $sql = "SELECT * FROM products gebb LEFT JOIN "
	     . "(SELECT *, SUM(inventoryquantity) AS stoksttle FROM inventory webb LEFT JOIN "
	     . "(SELECT *, SUM(salesquantity) AS salesttle FROM sales WHERE salestatus=:stecsa GROUP BY salesproduct) webba "
	     . "ON webb.inventoryproduct = webba.salesproduct WHERE inventorystatus=:stecs GROUP BY webb.inventoryproduct) gebba "
	     . "ON gebb.productcode=gebba.inventoryproduct";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':stecs' => $state, ':stecsa' => $steta));

    $count = 0;

    while ($row = $resultp->fetch(PDO::FETCH_ASSOC)) {
	 $stkstate = (intval($row["stoksttle"]) - intval($row["salesttle"]) ) - intval($row["prdctreorderlvl"]);

	 if ($stkstate < 0) {
	     array_push($lowstocked, $row["productcode"]);
	     ++$count;
	 }
    }

    if ($mims === "invenTools") {
	 if (sizeof($lowstocked) > 0) {
	     nwInventcycle($lowstocked);
	 }
    }


    return $count;
}

/* Get all stocks balances */

function gtaStkbalances($Sres, $srchdeterm) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $comgisto = [[]];
    $state = "Dispatched";
    $steta = "Active";

    for ($desc = 1; $desc < sizeof($Sres) + 1; $desc++) {
	 $usrdesc = [];
	 array_push($comgisto, $usrdesc);
    }


    if ($srchdeterm === "nada" || $srchdeterm === "") {
	 $sql = "SELECT * FROM products gebb LEFT JOIN "
		  . "(SELECT *, SUM(inventoryquantity) AS stoksttle FROM inventory webb LEFT JOIN "
		  . "(SELECT *, SUM(salesquantity) AS salesttle FROM sales WHERE salestatus=:stecsa GROUP BY salesproduct) webba "
		  . "ON webb.inventoryproduct = webba.salesproduct WHERE inventorystatus=:stecs GROUP BY webb.inventoryproduct) gebba "
		  . "ON gebb.productcode=gebba.inventoryproduct";

	 $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	 $resultp->execute(array(':stecs' => $state, ':stecsa' => $steta));
    } else {
	 $sql = "SELECT * FROM products gebb LEFT JOIN "
		  . "(SELECT *, SUM(inventoryquantity) AS stoksttle FROM inventory webb LEFT JOIN "
		  . "(SELECT *, SUM(salesquantity) AS salesttle FROM sales WHERE salestatus=:stecsa GROUP BY salesproduct) webba "
		  . "ON webb.inventoryproduct = webba.salesproduct WHERE inventorystatus=:stecs GROUP BY webb.inventoryproduct) gebba "
		  . "ON gebb.productcode=gebba.inventoryproduct WHERE gebb.productname LIKE CONCAT('%',:srch,'%')";

	 $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	 $resultp->execute(array(':stecs' => $state, ':stecsa' => $steta, ':srch' => $srchdeterm));
    }

    $count = 0;

    while ($row = $resultp->fetch(PDO::FETCH_ASSOC)) {
	 $stkbalance = number_format(intval($row['stoksttle']) - intval($row['salesttle']));

	 array_push($comgisto[0], $row[$Sres[0]]);
	 array_push($comgisto[1], number_format(intval($row[$Sres[1]])));
	 array_push($comgisto[2], $stkbalance);
	 array_push($comgisto[3], number_format(intval($row[$Sres[2]])));

	 ++$count;
    }


    return $comgisto;
}

/* Get all stocks entered */

function gtaStkentry($stexa, $Sres, $srchdeterm, $frodta, $todta) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $comgisto = [[]];

    for ($desc = 1; $desc < sizeof($Sres); $desc++) {
	 $usrdesc = [];
	 array_push($comgisto, $usrdesc);
    }


    if ($srchdeterm === "nada" || $srchdeterm === "") {
	 $sqlp = "SELECT * FROM inventory debb LEFT JOIN products debby "
		  . "ON debb.inventoryproduct = debby.productcode WHERE inventorystatus=:stecs AND "
		  . "CAST(inventorydate AS DATE) BETWEEN :frodta AND :todta";

	 $resultp = $link->prepare($sqlp, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	 $resultp->execute(array(':stecs' => $stexa, ':frodta' => gtDflip($frodta), ':todta' => gtDflip($todta)));
    } else {
	 $sqlp = "SELECT * FROM inventory debb LEFT JOIN products debby "
		  . "ON debb.inventoryproduct = debby.productcode WHERE inventorystatus=:stecs AND "
		  . "debby.productname LIKE CONCAT('%',:srch,'%') AND "
		  . "CAST(inventorydate AS DATE) BETWEEN :frodta AND :todta";

	 $resultp = $link->prepare($sqlp, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	 $resultp->execute(array(':stecs' => $stexa, ':srch' => $srchdeterm, ':frodta' => gtDflip($frodta), ':todta' => gtDflip($todta)));
    }

    $count = 0;

    while ($row = $resultp->fetch(PDO::FETCH_ASSOC)) {

	 for ($desca = 0; $desca < sizeof($Sres); $desca++) {
	     if ($Sres[$desca] === "inventorydate") {
		  array_push($comgisto[$desca], gtDpresocs($row[$Sres[$desca]]));
	     } else if ($Sres[$desca] === "inventoryquantity") {
		  array_push($comgisto[$desca], number_format($row[$Sres[$desca]]));
	     } else {
		  array_push($comgisto[$desca], $row[$Sres[$desca]]);
	     }
	 }

	 ++$count;
    }


    return $comgisto;
}

/* Insert new inventory */

function nwInventcycle($lowstocked) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $datearry = dateGtprev();
    $date = $datearry[5];
    $status = "Pending";

    for ($d = 0; $d < sizeof($lowstocked); $d++) {
	 $sql = "SELECT productcode, prdctreorderqnty FROM products WHERE productcode=:codec";

	 $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	 $resultp->execute(array(':codec' => $lowstocked[$d]));

	 $row = $resultp->fetch(PDO::FETCH_ASSOC);
	 $qnty = intval($row['prdctreorderqnty']);

	 $tmstomp = gtTimestamp();
	 $recode = "INVENT" . $tmstomp . "RECODE" . $d;

	 $dbess = "inventory";
	 $data = array($date, $lowstocked[$d], $qnty, $recode, $status);
	 $micer = array("inventorydate", "inventoryproduct", "inventoryquantity", "inventoryrecordcode", "inventorystatus");
	 $micermod = array(":dta", ":prdct", ":qnitty", ":recode", ":status");

	 nwInventory($dbess, $micer, $micermod, $data);
    }
}

function nwInventory($dbess, $micer, $micermod, $data) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");
    $catoca = "Error";

    $smit = $link->prepare("INSERT INTO " . $dbess . " (" . implode(",", $micer) . ") "
	     . "VALUES (" . implode(",", $micermod) . ");");

    for ($i = 0; $i < sizeof($data); $i++) {
	 try {
	     $smit->bindParam($micermod[$i], $data[$i]);

	     $catoca = "success";
	 } catch (Exception $e) {
	     
	 }
    }

    $smit->execute();

    return $catoca;
}
