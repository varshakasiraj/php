<?php
class permissionForm{
    public function data($formaction,$id = "",$module_name="",$create="",$read="",$update="",$delete="",$rollid=""){
       global $site_url;
        $data = array(
           "siteurl"=>"$site_url"."/user",
           "id"=>"$id",
           "module_name"=>"$module_name",
           "create"=>"$create",
           "read"=>"$read",
           "update"=>"$update",
           "delete"=>"$delete",
           "rollid"=>"$rollid",
           "formaction"=>"$formaction",
        );
        return $this->renderform($data);
    }
    public function renderform($data){
        ?>
        <form id="<?php $data["formaction"]?>" method="POST" action="<?php $data["siteurl"] ?>" enctype="multipart/form-data">
        <table>
                    <tr>
                        <td><label for="module_name">module_name</label></td>
                        <td><input type="text" id="module_name" name="module_name" value="<?php echo $data["module_name"]; ?>" required /></td>
                    </tr>
                    <tr>
                        <td><label for="create">create</label></td>
                        <td>
                            <input type="checkbox" class="true" name="create" value="true">
                        </td>
                    </tr>
                    <tr>
                        <td><label for = "read">read</label></td>
                        <td>
                            <input type="checkbox" class="true" name="read" value="true">
                        </td>
                    </tr>
                    <tr>
                        <td><label for = "update">update</label></td>
                        <td>
                            <input type="checkbox" class="true"  name="update" value="true">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="delete">delete</label></td>
                        <td>
                            <input type="checkbox" class="true" name="delete" value="true">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="rollid">rollid</label></td>
                        <td> <select name="rollid">
                            <option value="1">ADMIN</option>
                            <option value="2">CLIENT</option>
                        </select></td>
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
$permissionformtemplate = new permissionForm();
?>
