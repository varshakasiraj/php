<?php
include_once '../db/db.php' ;
$host='localhost';
$username='root';
$dbpass='';
$dbname='shop';
$site_url = "http://localhost/php/user/";
$image_path = "../assets/image/";
$asset_uri=dirname(__DIR__) . "\assets";
$css_url = "../assets/css/style.css";
$singleproduct_css_url="/php/assets/css/singleproduct.css";
$db = new db($host,$username,$dbpass,$dbname);

global $db;
?>
