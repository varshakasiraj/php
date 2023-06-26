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
        global $errors;
        if (!empty($_POST['formaction']) && $_POST['formaction'] == "insertProduct") {
            $errors = array();
            global $asset_uri, $error;
            $error = array(
                "img" => "your file is not acceptable or empty",
                "title" => " Title filed Contains  less or more than 8 to 10 character or empty",
                "description_tag" => "description tag Contains  less or more than 8 to 10 character  or empty",
                "price" => "only float value is acceptable"
            );
            $title = $_POST['title'];
            $description_tag = $_POST['description_tag'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image = $_FILES['img'];
            $img = $this->imagevalidation($image);
            if (empty($title) && !preg_match("/^[a-z]{15,20}/", $description_tag)) {
                $errors[] = $error["description_tag"];
            }
            if (empty($title) && !preg_match("/^[a-z]{8,10}/", $title)) {
                $errors[] = $error["title"];
            }
            if (empty($price) && !is_float($price)) {
                $errors[] = $error["price"];
            }
           // $insert_input = "'$img'," . "'$title'," . "'$description_tag'," . "'$description'," . "'$price'";
            return [
                //"sucess" => $this->insertProduct($insert_input),
                "errors" => $errors
            ];
        }

    }

    public function imagevalidation($image)
    {
        global $_POST;
        global $asset_uri, $error,$errors,$img_path;
        $allowed_img_extension = array("png", "jpg", "jpeg", "jfif");
        $basename = basename($_FILES["img"]["name"]);
        $extension = substr(strrchr($basename, '.'), 1);
        if (!empty($image) && in_array($extension, $allowed_img_extension)) {
            $path = $_FILES['img']['tmp_name'];
            $image_path = $asset_uri."\image\products\\" . $basename;
            move_uploaded_file($path, $image_path);
            $img_path='/php/assets/image/products/'.$basename;
        } else {
            $errors[]=$error['img'];
        }
        return $img_path;

    }



}
$products_obj = new product();
?>