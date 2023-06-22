<?php
include_once '../config/settings.php';

class product {
    public function getProduct(){
        global $db;
        $products=$db->select_query("Select * from iteam");
        return $products;
    }
    public function insertProduct($insert_input){
        global $db;
        $insert_query= $db->insert_query("insert into iteam(img,title,description_tag,description,price)"."values(
            $insert_input)");    
        return $insert_query;
    }
    public function processPostProduct(){
        global $_POST;
        if(!empty($_POST['formaction']) && $_POST['formaction']=="insertProduct"){
            
            $img=$_POST['img'];
            $title=$_POST['title'];
            $description_tag=$_POST['description_tag'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $insert_input="'$img,'" . "'$title,'"."'$description_tag,'"."'$description,'"."'$price'";
        }
        return $this->insertProduct($insert_input) ;

    }
}
$products_obj = new product();
?>