<?php
include_once 'user.php';
include_once './template/form.php';
global $user;
if(empty( $_GET['id'] ) ){
    echo die();
}else{
    $id = $_GET['id'];
}
$user = $user->getProcessUser($id);

if(!empty($_POST['formaction']) && $_POST['formaction'] == "updateUser") {
    $update = $user->processUpdateUser($id);
}
?>
<div class="update_form">
    <center>
    <?php
    foreach($user as $iteam){
        $edit = $formtemplate->data("updateUser",$iteam["id"],$iteam["image"],
        $iteam["name"],$iteam["gender"],$iteam["password"],$iteam["email"],$iteam["phone"],$iteam["address"]);
    }
    	if (!empty($update['errors'])) {
				foreach ($update['errors'] as $error) {
					echo "<h5 style='color:red'>"   . $error   . "</h5><br>";
				}
			} 
            ?>
    </center>

</div>