<?php
include_once 'product.php';
global $products_obj;
if(empty($_GET['id'])){
    echo die();
}else{
    $id = $_GET['id'];
}

$products = $products_obj->deleteProduct($id);
if($products==true){
    echo"deleted sucessfully";
}

?>