<?php
include_once 'product.php';
include_once '../template/form.php';
global $products_obj;
if(empty( $_GET['id'] ) ){
    echo die();
}else{
    $id = $_GET['id'];
}
$products = $products_obj->getProcessProduct($id);
if(!empty($_POST['formaction']) && $_POST['formaction'] == "updateProduct") {
    $update = $products_obj->processUpdateProduct($id);
}
?>
<div class="update_form">
    <center>
    <?php
    foreach($products as $iteam){
        $edit = $template->data("updateProduct",$iteam["id"],$iteam["title"], $iteam["description_tag"],$iteam["description"], $iteam["price"]);
    }
    
           
			if (!empty($update['errors'])) {
				foreach ($update['errors'] as $error) {
					echo "<h5 style='color:red'>"   . $error   . "</h5><br>";
				}
			} 
            ?>
    </center>

</div>