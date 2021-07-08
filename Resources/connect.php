<?php

/* Turn off error reporting */
error_reporting(0);

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'kefisuser');
define('DB_PASSWORD', 'nZxB@hoq2UR6t9');
define('DB_DATABASE', 'kefisinvent');

/* PDO Database Connection */
try {
    $link = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    
}



 



