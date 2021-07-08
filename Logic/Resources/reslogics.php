<?php

/* Turn off error reporting */
error_reporting(0);

/* Search products */

function gtProducts($str) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $comgisto = [];

    $sqlp = "SELECT productname AS klos FROM products WHERE  productname "
	     . "LIKE CONCAT('%',:srch,'%') LIMIT 10";

    $resultp = $link->prepare($sqlp, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':srch' => $str));

    $count = 0;

    while ($row = $resultp->fetch(PDO::FETCH_ASSOC)) {
	 array_push($comgisto, $row["klos"]);

	 ++$count;
    }


    return $comgisto;
}
