<?php
include_once 'user.php';
include_once '../template/productheader.php';
$header = $header->loginHeader();
$check = $user->check();
$user_validation = $user->loginValidation();
?>
<link href='../assets/css/login.css' rel='stylesheet' type='text/css'/>
<style>
    table{
    margin: 100px auto;
}
    </style>
<body>
    <div class="container">
        <form method="POST" action="http://localhost/php/user/login.php" enctype="multipart/form-data">
           <table >
               <tr>
                    <div>
                        <td><label for="name">NAME</label></td>
                        <td><input type="text" id="name" name="name" required/></td>
                    </div>
               </tr>
                <tr>
                    <div>
                        <td><label for="password">PASSWORD</label></td>
                        <td><input type="password" id="password" name="password" required/></td>
                    </div>
                </tr>
                <tr>
                    <div colspan="2">
                        <td><input type = "submit" name = "submit" value = "login" /></td>
                    </div>
                </tr>
                <td><input type = "hidden" name = "formaction" value = "loginPage" /></td>
        </table>
        </form> 
    </div>
</body>

<h4 style="color:red"><?php $user_validation = $user->loginValidation();?></h4>