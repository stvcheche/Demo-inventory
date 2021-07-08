<?php

/* Turn off error reporting */
error_reporting(0);

/* Total sales */

function saleTotal() {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $sql = "SELECT *, SUM(salesquantity) AS salesttle FROM sales";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute();

    $row = $resultp->fetch(PDO::FETCH_ASSOC);
    $ttles = number_format(intval($row['salesttle']));

    return $ttles;
}

/* Active/Deleted sales */

function adsaleTotal($status) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $sql = "SELECT *, SUM(salesquantity) AS salesttle FROM sales WHERE salestatus=:stecs";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':stecs' => $status));

    $row = $resultp->fetch(PDO::FETCH_ASSOC);
    $ttles = number_format(intval($row['salesttle']));

    return $ttles;
}

/* Get all sales */

function gtaSales($Sres, $srchdeterm, $frodta, $todta) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");
    $stexa = "Active";

    $comgisto = [[]];

    for ($desc = 1; $desc < sizeof($Sres); $desc++) {
	 $usrdesc = [];
	 array_push($comgisto, $usrdesc);
    }


    if ($srchdeterm === "nada" || $srchdeterm === "") {
	 $sqlp = "SELECT * FROM sales debb LEFT JOIN products debby "
		  . "ON debb.salesproduct = debby.productcode WHERE salestatus=:stecs AND "
		  . "CAST(salesdate AS DATE) BETWEEN :frodta AND :todta";

	 $resultp = $link->prepare($sqlp, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	 $resultp->execute(array(':stecs' => $stexa, ':frodta' => gtDflip($frodta), ':todta' => gtDflip($todta)));
    } else {
	 $sqlp = "SELECT * FROM sales debb LEFT JOIN products debby "
		  . "ON debb.salesproduct = debby.productcode WHERE salestatus=:stecs AND "
		  . "productname LIKE CONCAT('%',:srch,'%') AND "
		  . "CAST(salesdate AS DATE) BETWEEN :frodta AND :todta";

	 $resultp = $link->prepare($sqlp, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	 $resultp->execute(array(':stecs' => $stexa, ':srch' => $srchdeterm, ':frodta' => gtDflip($frodta), ':todta' => gtDflip($todta)));
    }

    $count = 0;

    while ($row = $resultp->fetch(PDO::FETCH_ASSOC)) {

	 for ($desca = 0; $desca < sizeof($Sres); $desca++) {
	     if ($Sres[$desca] === "salesdate") {
		  array_push($comgisto[$desca], gtDpresocs($row[$Sres[$desca]]));
	     } else if ($Sres[$desca] === "salesprice" || $Sres[$desca] === "salesquantity") {
		  array_push($comgisto[$desca], number_format($row[$Sres[$desca]]));
	     } else {
		  array_push($comgisto[$desca], $row[$Sres[$desca]]);
	     }
	 }

	 ++$count;
    }


    return $comgisto;
}
