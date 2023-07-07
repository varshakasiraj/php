<?php
include_once 'permission.php';
global $user;
if(empty($_GET[ 'id' ]) ){
    echo die();
}else{
    $id = $_GET['id'];
}
$user= $permission->deletePermission($id);
if($user == true){
    echo"deleted sucessfully";
}

?>