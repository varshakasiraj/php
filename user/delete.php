<?php
include_once 'user.php';
global $user;
if(empty($_GET[ 'id' ]) ){
    echo die();
}else{
    $id = $_GET['id'];
}

$user= $user->deleteUser($id);
if($user == true){
    echo"deleted sucessfully";
}

?>