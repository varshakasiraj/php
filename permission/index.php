<?php
include_once './template/permissionform.php';
include_once '../template/productheader.php';
include_once '../user/user.php';
include_once 'permission.php';
echo "<link href='../assets/css/permission.css' rel='stylesheet' type='text/css'/>";
$header = $header->permissionHeader();
$user_view = $user->getUser();
$result_roll = $user->get_role($user_view[0]["rollid"]);
$result_permission = $permission->getPermission($result_roll[0]["id"]);
$permission_result = $permission->processPermission();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<body>
    <div class="container-fluid">
       <table class="table">
            <thead class="table-dark">
                <th>modulename</th>
                <th>create</th>
                <th>read</th>
                <th>update</th>
                <th>delete</th>
                <th>rollid</th>
                <th></th>
                <th></th>
            </thead>
                <?php
                    foreach($result_permission as $permission){
                ?>  
                        <tr class="bottom-border-solid">
                            <td>
                                <div>
                                    <?php echo $permission["modulename"] ?>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <?php
                                        if($permission["permission_create"] == "true"){
                                        echo" <input type='checkbox'checked>";
                                        }
                                        else{
                                            echo"<input type='checkbox'unchecked>";
                                        }
                                    ?>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <?php 
                                        if($permission["permission_read"] == "true"){
                                            echo" <input type='checkbox'checked>";
                                        }
                                        else{
                                             echo"<input type='checkbox'unchecked>";
                                         }
                                    ?>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <?php 
                                       if($permission["permission_update"]  == "true"){
                                        echo" <input type='checkbox'checked>";
                                        }
                                        else{
                                            echo"<input type='checkbox'unchecked>";
                                        }     
                                    ?>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <?php 
                                       if($permission["permission_delete"] == "true"){
                                         echo" <input type='checkbox'checked>";
                                       }
                                       else{
                                         echo"<input type='checkbox'unchecked>";
                                        }     
                                    ?>
                                    </div>
                            </td> 
                            <td>
                                <div> 
                                    <select name="rollid" <?php echo $permission["rollid"] ?>>
                                            <option value="1">ADMIN</option>
                                            <option value="2">CLIENT</option>
                                        </select>
                                </div>
                            </td>
                            <td>
                                <a <?php echo"href =edit.php?id=" . $permission["id"] ?> target='_blank'><button class="edit"><i class="fa-solid fa-pen-to-square"></i>Edit</button><?php echo"</a>"?>
                                <a <?php echo"href =delete.php?id=" . $permission["id"] ?> target='_blank'><button class="delete"><i class="fa-solid fa-trash"></i>Delete</button><?php echo"</a>"?>
                            </td>
                            </tr>
                <?php
                    }
                ?>
        </table>
    </div>  
    <div>
        <center>
            <?php 
              $permissionformtemplate->data("insertpermission");
            ?>
        </center>
    </div>
</body>