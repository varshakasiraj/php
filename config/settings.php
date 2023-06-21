<?php
include_once '../db/db.php' ;
$host='localhost';
$username='root';
$dbpass='';
$dbname='shop';
$site_url = "http://localhost/php/";
$image_path = "../assets/image/";
$css_url = "../assets/css/style.css";
$db = new db($host,$username,$dbpass,$dbname);

global $db;
?>
