<?php

/* Turn off error reporting */
error_reporting(0);

/* Total products */

function productTotal() {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $sql = "SELECT *, COUNT(productid) AS prdctotal FROM products";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute();

    $row = $resultp->fetch(PDO::FETCH_ASSOC);
    $ttles = number_format(intval($row['prdctotal']));

    return $ttles;
}

/* Active/Deleted products */

function adproductTotal($status) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $sql = "SELECT *, COUNT(productid) AS prdctotal FROM products WHERE productstatus=:stecs";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':stecs' => $status));

    $row = $resultp->fetch(PDO::FETCH_ASSOC);
    $ttles = number_format(intval($row['prdctotal']));

    return $ttles;
}

/* Get all products */

function gtaProducts($vexac, $Sres, $srchdeterm) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $comgisto = [[]];

    for ($desc = 1; $desc < sizeof($Sres); $desc++) {
	 $usrdesc = [];
	 array_push($comgisto, $usrdesc);
    }


    if ($srchdeterm === "nada" || $srchdeterm === "") {
	 $sqlp = "SELECT * FROM products WHERE productstatus=:stecs";

	 $resultp = $link->prepare($sqlp, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	 $resultp->execute(array(':stecs' => $vexac));
    } else {
	 $sqlp = "SELECT * FROM  products WHERE productstatus=:stecs AND productname LIKE CONCAT('%',:srch,'%') ";

	 $resultp = $link->prepare($sqlp, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	 $resultp->execute(array(':stecs' => $vexac, ':srch' => $srchdeterm));
    }

    $count = 0;

    while ($row = $resultp->fetch(PDO::FETCH_ASSOC)) {

	 for ($desca = 0; $desca < sizeof($Sres); $desca++) {
	     if ($Sres[$desca] === "productprice" || $Sres[$desca] === "prdctreorderlvl" || $Sres[$desca] === "prdctreorderqnty") {
		  array_push($comgisto[$desca], number_format($row[$Sres[$desca]]));
	     } else {
		  array_push($comgisto[$desca], $row[$Sres[$desca]]);
	     }
	     ++$count;
	 }
    }

    return $comgisto;
}
