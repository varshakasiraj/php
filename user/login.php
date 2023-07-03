<?php
include_once 'user.php';
include_once '../template/productheader.php';
$header = $header->shopHeader();
?>
<link href='../assets/css/login.css' rel='stylesheet' type='text/css'/>
<body>
    <div class="container">
        <form method="POST" action="http://localhost/php/user/login.php" enctype="multipart/form-data">
           <table align="bottom-center">
               <tr>
                    <div>
                        <td><label for="name">name</label></td>
                        <td><input type="text" id="name" name="name" required/></td>
                    </div>
               </tr>
                <tr>
                    <div>
                        <td><label for="password">password</label></td>
                        <td><input type="text" id="password" name="password" required/></td>
                    </div>
                </tr>
                <tr>
                    <div>
                        <td><input type = "submit" name = "submit" value = "submit" /></td>
                        <td><input type = "hidden" name = "formaction" value = "loginPage" /></td>
                    </div>
                </tr>
        </table>
        </form> 
    </div>
</body>

<h4 style="color:red"><?php $user_validation = $user->loginValidation();?></h4>