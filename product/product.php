<?php
include_once '../config/settings.php';

class product
{
    public function getProduct()
    {
        global $db;
        $products = $db->select_query("Select * from iteam");
        return $products;
    }
    public function insertProduct($insert_input)
    {
        global $db;
        $insert_query = $db->insert_query("insert into iteam(img,title,description_tag,description,price)" . "values(
            $insert_input)");
        return $insert_query;
    }
    public function processPostProduct()
    {
        global $_POST;
        global $_FILES;

        if (!empty($_POST['formaction']) && $_POST['formaction'] == "insertProduct") {

            global $asset_uri;
            $error = array(
                "img" => "check your image filed",
                "title" => " Title filed Contains  less or more than 8 to 10 character ",
                "description_tag" => "description tag Contains  less or more than 8 to 10 character ",
                "price" => "only float value is acceptable"
            );
            $allowed_img_extension = array("png", "jpg", "jpeg", "jfif");
            $path = $_FILES['img']['tmp_name'];
            $basename = basename($_FILES["img"]["name"]);
            $image_path = $asset_uri . "/image/products/" . $basename;
            $extension = $ext = substr(strrchr($basename, '.'), 1);
            $title = $_POST['title'];
            $description_tag = $_POST['description_tag'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            if (!empty([$_FILES["img"]]) && in_array($extension, $allowed_img_extension)) {

                move_uploaded_file($path, $image_path);

            }
            if (!preg_match("/^[A-z]{15,20}/", $description_tag)) {
                echo $error["title"];
            }
            if (!preg_match("/^[A-z]{8,10}/", $title)) {
                echo $error["title"];
            }
            if (!is_float($price)) {
                echo $error["price"];
            }
            // $insert_input="'$img'," . "'$title',"."'$description_tag',"."'$description',"."'$price'";
            //  return $this->insertProduct($insert_input) ;
        }


    }

    
}
$products_obj = new product();
?>