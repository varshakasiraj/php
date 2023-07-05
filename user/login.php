<?php
include_once 'user.php';
include_once'./template/form.php';
include_once '../template/productheader.php';
echo "<link href='" .$user_css_url. "' rel='stylesheet' type='text/css'/>";
$user_view = $user->getUser();
$insertUser=$user->processInputUser();
$user_validation = $user->loginValidation();
$header->shopHeader();
$check_user =$user->check();
?>
<style>
    .image{
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }
    img{
        width:100%;
        height:100%;
        object-fit:fill;
        opacity:78%;
        border-radius: 50%;
    }
    table{
        margin: 20px auto;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<body>
          
            <table class="table">
                <thead class="table-dark">
                    <th>image</th>
                    <th>name</th>
                    <th>gender</th>
                    <th>email</th>
                    <th>password</th>
                    <th>phone</th>
                    <th>address</th>
                </thead>
                <?php
                    foreach($user_view as $user){
                  ?>  
                        <tr class="bottom-border-solid">
                            <td>
                                <div class="image">
                                     <image src="<?php echo $user["image"] ?>" alt=""/>
                                </div>
                            </td>
                            <td>
                                <div><?php echo $user["name"] ?></div>
                            </td>
                            <td>
                                <div><?php echo $user["gender"] ?></div>
                            </td>
                            <td>
                                <div><?php echo $user["email"] ?></div>
                            </td>
                            <td>
                                <div><?php echo $user["password"] ?></div>
                            </td>
                            <td>
                                <div><?php echo $user["phone"] ?></div>
                            </td>
                            <td>
                                <div><?php echo $user["address"] ?></div>
                            </td>
                            <td>
                            <a <?php echo"href =edit.php?id=" . $user["id"] ?> target='_blank'><button>Edit</button><?php echo"</a>"?>
						    <a <?php echo"href =delete.php?id=" . $user["id"] ?> target='_blank'><button>Delete</button><?php echo"</a>"?>
                            </td>
                        </tr>
            <?php
             }
            ?>
            </table>
    <?php
        $input_form =$formtemplate->data("inputUser");
        if (!empty($insertUser['errors'])) {
            foreach ($insertUser['errors'] as $error) {
                echo "<h5 style='color:red'>" . $error . "</h5><br>";
            }
        }
    ?>
</body>    




