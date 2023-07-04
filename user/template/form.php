<?php
class UserFormTemplate{
    public function data($formaction,$id = "",$img="",$name="",$gender="",$password="",$email="",$phone="",$address=""){
       global $site_url;
        $data = array(
           "siteurl"=>"$site_url"."/user",
           "id"=>"$id",
           "img"=>"$img",
           "name"=>"$name",
           "gender"=>"$gender",
           "password"=>"$password",
           "email"=>"$email",
           "phone"=>"$phone",
           "address"=>"$address",
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
                        <td><input type="file" id="img" name="img" value="<?php echo $data["img"]; ?>" required /></td>
                    </tr>
                    <tr>
                        <td><label for="name">name</label></td>
                        <td><input type="text" id="name" name="name" value=" <?php echo $data["name"]; ?>" required/></td>
                    </tr>
                    <tr>
                        <td><label for = "gender">gender</label></td>
                        <td>
                           
                            <input type = "radio" id = "female" name = "gender" value = "female" />
                            <label for = "female">female</label>
                            <input type = "radio" id = "male" name = "gender" value = "male" />
                            <label for = "male">male</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="email">email</label></td>
                        <td><input type="text" id="email" name="email" value="<?php echo $data["email"]; ?>" /></td>
                    </tr>
                    <tr>
                        <td><label for = "password">password</label></td>
                        <td><input type = "password" id = "password" name = "password" value = "<?php echo $data["password"] ?>" /></td>
                    </tr>
                    <tr>
                        <td><label for = "phone">phone</label></td>
                        <td><input type = "tel" id = "phone" name = "phone" value = "<?php echo $data["phone"] ?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="address">address</label></td>
                        <td><textarea name="address" id="address" name="address" ><?php echo  $data["address"]; ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan ="1"></td>
                        <td><input type = "submit" name = "submit" value = "submit" /></td>
                    </tr>
                </table>
                <input type = "hidden" name = 'id' value = "<?php echo $data['id'];?>"/>
                <input type = "hidden" name = "formaction" value = "<?php echo $data["formaction"]?>" />
            <?php
    }
}
$formtemplate = new UserFormTemplate();