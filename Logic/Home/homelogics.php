<?php

/* Turn off error reporting */
error_reporting(0);

/* Get all products */

function alProducts() {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");
    $vexac = "Active";
    $Sres = array("productcode", "productname", "productprice");

    $comgisto = [[]];

    for ($desc = 1; $desc < sizeof($Sres); $desc++) {
	 $usrdesc = [];
	 array_push($comgisto, $usrdesc);
    }


    $sqlp = "SELECT * FROM products WHERE productstatus=:stecs";

    $resultp = $link->prepare($sqlp, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':stecs' => $vexac));

    $count = 0;

    while ($row = $resultp->fetch(PDO::FETCH_ASSOC)) {

	 for ($desca = 0; $desca < sizeof($Sres); $desca++) {
	     array_push($comgisto[$desca], $row[$Sres[$desca]]);
	     ++$count;
	 }
    }

    return $comgisto;
}

/* Save record */

function svRecd($data, $dbess, $micer, $micermod) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");
    $catoca = "Error";

    $smit = $link->prepare("INSERT INTO " . $dbess . " (" . implode(",", $micer) . ") "
	     . "VALUES (" . implode(",", $micermod) . ");");

    for ($i = 0; $i < sizeof($data); $i++) {
	 try {
	     $smit->bindParam($micermod[$i], $data[$i]);

	     $catoca = "hrcool";
	 } catch (Exception $e) {
	     
	 }
    }

    $smit->execute();

    return $catoca;
}

/* Update record */

function updatUsr($dbmn, $ident, $dtata, $rowec, $idroot, $valed) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");
    $supre = null;

    for ($i = 0; $i < sizeof($valed); $i++) {
	 if (intval($rowec) === $i) {
	     $supre = $valed[$i];
	 }
    }

    if ($supre === "inventorydate" || $supre === "salesdate") {
	 $vexa = gtDflip(caddy($dtata));
    } elseif ($supre === "inventoryquantity" || $supre === "salesprice" || $supre === "salesquantity" ||
	     $supre === "productprice" || $supre === "prdctreorderlvl" || $supre === "prdctreorderqnty") {
	 $vexa = paddy($dtata);
    } else if ($supre === "inventoryproduct" || $supre === "salesproduct") {
	 $vexa = gtPrdctcode(caddy($dtata));
    } else {
	 $vexa = caddy($dtata);
    }

    $sql = "UPDATE " . $dbmn . " SET " . $supre . "=:targt WHERE " . $idroot . "=:targidec";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':targt' => $vexa, ':targidec' => $ident));

    return $supre;
}

function gtPrdctcode($name) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $sql = "SELECT * FROM products WHERE productname=:name";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':name' => $name));

    $row = $resultp->fetch(PDO::FETCH_ASSOC);
    $code = $row['productcode'];

    return $code;
}

/* Actdeactivate record */

function actdeaShop($dbmn, $swec, $wstex, $szec, $ident) {
    include($_SERVER["DOCUMENT_ROOT"] . "/Resources/connect.php");

    $sql = "UPDATE " . $dbmn . " SET " . $swec . "=:steca WHERE " . $szec . "=:ident";

    $resultp = $link->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $resultp->execute(array(':steca' => $wstex, ':ident' => $ident));

    return $message;
}
