<?php
include_once '../config/settings.php';

class template{
    public function data($formaction,$id,$title,$description_tag,$description,$price){
       global $site_url;
        $data = array(
           "siteurl"=>"$site_url"."/product",
           "id"=>"$id",
           "img"=>"",
           "title"=>"$title",
           "description_tag"=>"$description_tag",
           "description"=>"$description",
           "price"=>"$price",
           "formaction"=>"$formaction",
        );
        return $this->renderform($data);
    }
    public function renderform($data){
        ?>
        <form id="<?php $data["formaction"]?>" method="POST" action="<?php $data["siteurl"] ?>" enctype="multipart/form-data">
        <table>
                    <tr>
                        <td><label for="img">img</label></td>
                        <td><input type="file" id="img" name="img" value="<?php echo $data["img"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="title">title</label></td>
                        <td><input type="text" id="title" name="title" value=" <?php echo $data["title"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="description_tag">description_tag</label></td>
                        <td><input type="text" id="description_tag" name="description_tag" value="<?php echo $data["description_tag"]; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="description">description</label></td>
                        <td><textarea name="description" id="description" name="description" ><?php echo  $data["description"]; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for = "price">price</label></td>
                        <td><input type = "text" id = "price" name = "price" value = "<?php echo $data["price"] ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan ="1"></td>
                        <td><input type = "submit" name = "submit" value = "submit" /></td>
                    </tr>
                </table>
                <input type = "hidden" name = 'id' value = "<?php echo $data['id'];?>"/>
                <input type = "hidden" name = "formaction" value = "<?php echo $data["formaction"]?>" />
            </form>
            <?php
    }
}
$template = new template();
?>