<?php
include_once './template/permissionform.php';
include_once 'user.php';
$user_view = $user->getUser();
$result_roll = $user->get_role($user_view[0]["rollid"]);
$result_permission = $user->get_permission($result_roll[0]["id"]);
var_dump($result_permission);
?>
<div class="container-fluid">
<table class="table">
                <thead class="table-dark">
                    <th>modulename</th>
                    <th>create</th>
                    <th>read</th>
                    <th>update</th>
                    <th>delete</th>
                    <th>rollid</th>
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
                                <div><?php echo $permission["create"] ?></div>
                            </td>
                            <td>
                                <div><?php echo $permission["read"] ?></div>
                            </td>
                            <td>
                                <div><?php echo $permission["update"] ?></div>
                            </td>
                            <td>
                                <div>
                                    <?php echo $permission["delete"] ?>
                                    <input type="checkbox" value=""
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
                            <a <?php echo"href =edit.php?id=" . $permission["id"] ?> target='_blank'><button>Edit</button><?php echo"</a>"?>
						    <a <?php echo"href =delete.php?id=" . $permission["id"] ?> target='_blank'><button>Delete</button><?php echo"</a>"?>
                            </td>
                        </tr>
            <?php
             }
            ?>
            </table>
</div>
<?php 
$permissionformtemplate->data("insertpermission");
?>