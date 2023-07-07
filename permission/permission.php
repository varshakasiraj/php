<?php
include_once '../config/settings.php';
class Permission{
    public function getPermission($roll_id){
        global $db; 
        $permission = $db->select_query("Select * from permission where rollid = ".$roll_id);
        return $permission;
    }
    public function getProcessPermission($id){
     global $db; 
     $permission = $db->select_query("Select * from permission where id = ".$id);
     return $permission;
 }
    public function insertPermission($insert_input)
    {
        global $db;
        $insert_query = $db->insert_query("insert into permission(modulename,permission_create,permission_read,permission_update,permission_delete,rollid)" . "values(
            $insert_input)");
        return $insert_query;
    }
    public function processPermission(){
        global $_POST;
        global $insert_input;
        if (!empty($_POST['formaction']) && $_POST['formaction'] == "insertpermission") {
           $module_name = $_POST["module_name"];
           if(empty($_POST["create"])){
                $create = "false";
           }else{
                $create = "true";
           }
           if(empty($_POST["read"])){
                $read  = "false";
           }else{
                $read  = "true";
           }
           if(empty($_POST["update"])){
                $update = "false";
           }else{
                 $update  = "true";
           }
           if(empty($_POST["delete"])){
                $delete= "false";
           }else{
                 $delete  = "true";
           }
           $rollid = $_POST["rollid"];
           $insert_input = "'$module_name',"  . "'$create',". "'$read'," . "'$update',"  . "'$delete',". "'$rollid'" ;
           return $this->insertPermission($insert_input);
        }
    }
    public function processUpdateProduct($id){
        global $_POST;
        global $db;
        if (!empty($_POST['formaction']) && $_POST['formaction'] == "updatePermission") {
            $module_name = $_POST["module_name"];
            var_dump($_POST["roll"]);
            if(empty($_POST["create"])){
                 $create = "false";
            }else{
                 $create = "true";
            }
            if(empty($_POST["read"])){
                 $read  = "false";
            }else{
                 $read  = "true";
            }
            if(empty($_POST["update"])){
                 $update = "false";
            }else{
                  $update  = "true";
            }
            if(empty($_POST["delete"])){
                 $delete= "false";
            }else{
                  $delete  = "true";
            }
            $update_query=$db->update_query("update permission set modulename ="  ."'$module_name'," . "permission_create =" . "'$create'," . 
            "permission_read = "  ."'$read',"   ."permission_update = ".   "'$update'," .  "permission_delete = " . "'$delete'," . "rollid= '" 
            . $_POST['roll'] ."' where id ="  .$id);
            return $update_query;
        }
    }
    public function deletePermission($id){
        global $db;
        $delete_query = $db->delete_query("delete from permission where id = ".$id);
        return $delete_query;

    }
}
$permission = new Permission();
?>