<?php
include_once '../config/settings.php';
class User{
    public function getUser()
    {
        global $db;
        $user = $db->select_query("Select * from user");
        return $user;
    }

    
    public function insertUser($insert_input)
    {
        global $db;
        $insert_query = $db->insert_query("insert into user(image,name,gender,email,password,phone,address)" . "values(
            $insert_input)");
        return $insert_query;
    }
    public function getProcessUser($id)
    {
        global $db;
        $iteam_id = $id;
        $products = $db->select_query("Select * from user where id = ".$iteam_id);
        return $products;
    }
    public function processInputUser(){
        global $_POST;
        global $_FILES;
        global $errors,$insert_input;
        if (!empty($_POST['formaction']) && $_POST['formaction'] == "inputUser") {
            $errors = array();
            $img = $this->imageValidation($_FILES["img"]);
            $name =$this->nameValidation($_POST['name']);
            $gender =$this->genderValidation($_POST["gender"]);
            $phone = $this->phoneValidation($_POST["phone"]);
            $password = $_POST["password"];
            $email=$this->emailValidation($_POST["email"]);
            $address=$this->genderValidation($_POST["address"]);
            if($img["flag"] == true){
                $image_path = $img["path"];
                $insert_input = "'$image_path'";
            }
            if($img["flag"] == true){
              $image_path = $img["path"];
              $insert_input = "'$image_path',"  . "'$name',". "'$gender',"    . "'$email',"   . "'$password',"    . "'$phone'," 
              . "'$address'"  ;
            }
            return[
              "success"=>$this->insertUser($insert_input),
              "errors"=>$errors
            ];
        }
    }
    public function processUpdateProduct($id){
      global $_POST;
      global $_FILES;
      global $errors,$db;
      if (!empty($_POST['formaction']) && $_POST['formaction'] == "updateUser") {
          $errors = array();
          $img = $this->imageValidation($_FILES["img"]);
          $image=$img;
          $name =$this->nameValidation($_POST['name']);
          $gender =$this->genderValidation($_POST["gender"]);
          $phone = $this->phoneValidation($_POST["phone"]);
          $password = $_POST["password"];
          $email=$this->emailValidation($_POST["email"]);
          $address=$this->genderValidation($_POST["address"]);
          $update_query=$db->update_query("update user set img ="  ."'$image'," . "$name =" . "'$name'," .  "gender = "  ."'$gender',"  
           ."email = ".   "'$email'," .  "password = " . "'$password'," .  "phone = " . "'$phone'," ."address = " . "'$address'" .  "where id ="  .$id);
          }
          var_dump($update_query);
          return[
            "success"=>$this->insertUser($update_query),
            "errors"=>$errors
          ];
      }
      public function deleteProduct($id){
        global $db;
        $delete_query = $db->delete_query("delete from user where id = ".$id);
        return $delete_query;

    }
   public function errors(){
        $error = array(
            "img" => "your file is not acceptable or empty",
            "name"=>"only whitespace are acceptable",
            "gender"=>"Select a gender",
            "email"=>"Eg:varshakasiraj16@gmail.com",
            "password"=>"",
            "phone"=>"",
        );
        return $error;
    }
    public function imageValidation($image)
    {
        global $_POST;
        global $asset_uri,$img_path,$errors;
        $allowed_img_extension = array("png", "jpg", "jpeg", "jfif");
        $basename = basename($_FILES["img"]["name"]);
        $extension = substr(strrchr($basename, '.'), 1);
        if (!empty($image) && in_array($extension, $allowed_img_extension)) {
            $path = $_FILES['img']['tmp_name'];
            $image_path = $asset_uri."\image\user\\"   . $basename;
            move_uploaded_file($path, $image_path);
            $img_path = '/php/assets/image/user/'  .$basename;
            return ["path"=>$img_path,
            "flag"=>true];
        } else {
          $error_msg=$this->errors();
          return  ["path"=>$errors[] = $error_msg["img"],
          "flag"=>false];
        }
    }
    public function nameValidation($name){
      if( empty($name) && !preg_match("/^[a-z A-Z \s ]{20}/", $name)){
        $error_message = $this->errors();
        return ["error" => $error_message["name"]];
      }
      else{
        return $name;
      }
    }
    public function genderValidation($gender){
        if( empty($gender)){
          $error_message = $this->errors();
          return ["error" => $error_message["gender"]];
        }
        else{
          return $gender;
        }

    }
    public function emailValidation($email){
        if( empty($email) && !preg_match("/^[a-z A-Z _ 0-9]{6,20} @ [a-z]{5,7}( \.[a-z]{2,3})/", $email)){
          $error_message = $this->errors();
          return ["error" => $error_message["email"]];
        }
        else{
          return $email;
        }
    }
    public function phoneValidation($phone){
        if( empty($phone) && !preg_match("/(\+\d{1}", $phone)){
          $error_message = $this->errors();
          return ["error" => $error_message["phone"]];
        }
        else{
          return $phone;
        }
      }
      public function loginValidation(){
        if(!empty($_POST['formaction']) && $_POST['formaction'] == "loginPage"){
          global $db;
          $name = $_POST["name"];
          $password = $_POST["password"];
          $view =$db->select_query("SELECT * FROM user where name='$name' AND password='$password'");
          if(empty($view)){
            echo"Invalid user or password";
          }
          else{
            
            echo"Sucess";
            $name = $view[0]["name"];
            $id = $view[0]["id"];
            setcookie("cookie_id",$id,time() + (86400));
            setcookie("cookie_name",$name,time() + (86400));
           header("location:http://localhost/php/product/");
            //var_dump($this->getCookieName());
          }
      }
      
    }
    public function logout(){
       if (isset($_COOKIE["cookie_name"]) && isset($_COOKIE["cookie_id"])){
          setcookie("cookie_name", '', time() - (3600));
          setcookie("cookie_id", '', time() - (3600));
        } 
    }
    
    public function getCookieName(){
      var_dump($_COOKIE);
    }
}
$user = new User();