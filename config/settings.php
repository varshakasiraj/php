<?php
include_once '../db/db.php' ;
$host='localhost';
$username='root';
$dbpass='';
$dbname='shop';
$db = new db($host,$username,$dbpass,$dbname);
$db->fetch_asso($result);
?>
