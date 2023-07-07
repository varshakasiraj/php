<?php
include_once 'permission.php';
include_once './template/permissionform.php';
if(empty( $_GET['id'] ) ){
    echo die();
}else{
    $id = $_GET['id'];
}
$result = $permission->getProcessPermission($id);
if(!empty($_POST['formaction']) && $_POST['formaction'] == "updatePermission") {
    $permission_result = $permission->processUpdateProduct($id);
}
?>
<div class="update_form">
    <center>
    <?php
    foreach($result as $iteam){
        $edit = $permissionformtemplate->data("updatePermission",$iteam["id"],$iteam["modulename"], $iteam["permission_create"],$iteam["permission_read"], $iteam["permission_update"],
        $iteam["permission_delete"],$iteam["rollid"]);
    }
    
           
			if (!empty($update['errors'])) {
				foreach ($update['errors'] as $error) {
					echo "<h5 style='color:red'>"   . $error   . "</h5><br>";
				}
			} 
            ?>
    </center>

</div>