<?php
include_once '../config/settings.php';

class product {
    
    public function getProducts(){
        global $db;
        $products=$db->select_query("Select * from iteam");
        return $products;
    }
    public function get_insert(){
        $img="bag6.jifi";
        $title="Trending";
        $description_tag="chessboard handbag";
        $description="Totes are a casual style of handbag without a top closure,
        ideal for everything from travel to a day at the beach. Style editors at “Oprah”
        magazine recommend looking for a bag about the size of a cereal box to ensure you have enough 
        room.";
        $price="$25.00";
        $insert_query= "insert into iteam(img,title,description_tag,description,price)"."values(
            '$img','$title','$description_tag','$description','$price')";
        return $insert_query;
    }
}
$products_obj = new product();
?>