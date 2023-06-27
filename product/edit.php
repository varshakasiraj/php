<?php
include_once 'product.php';

global $products_obj;
if(empty($_GET['id'])){
    echo die();
}else{
    $id = $_GET['id'];
}
$products = $products_obj->getProcessProduct($id);
if(!empty($_POST['formupdate']) && $_POST['formupdate'] == "updateProduct") {
    $update = $products_obj->processUpdateProduct($id);
}
?>
<div class="update_form">
    <center>
    <?php
			foreach ($products as $iteam) {
				?>
            <form id="product_update" method="POST" action="<?php $site_url . "/product" ?>" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="img">img</label></td>
                        <td><input type="file" id="img" name="img" value=<?php echo $iteam["img"] ?> /></td>
                    </tr>
                    <tr>
                        <td><label for="title">title</label></td>
                        <td><input type="text" id="title" name="title" value=<?php echo $iteam["title"]; ?> /></td>
                    </tr>
                    <tr>
                        <td><label for="description_tag">description_tag</label></td>
                        <td><input type="text" id="description_tag" name="description_tag" value="<?php echo $iteam["description_tag"]; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="description">description</label></td>
                        <td><textarea name="description" id="description" name="description" ><?php echo  $iteam["description"]; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="price">price</label></td>
                        <td><input type="text" id="price" name="price" value=<?php echo $iteam["price"] ?> /></td>
                    </tr>
                    <tr>
                        <td colspan="1"></td>
                        <td><input type="submit" name="submit" value="submit" /></td>
                    </tr>
                </table>
                <input type="hidden" name='id' value=<?php $iteam['id']?>/>
                <input type="hidden" name="formupdate" value="updateProduct" />
            </form>
            <?php
			}
			if (!empty($update['errors'])) {
				foreach ($update['errors'] as $error) {
					echo "<h5 style='color:red'>" . $error . "</h5><br>";
				}
			} 
            ?>
    </center>

</div>