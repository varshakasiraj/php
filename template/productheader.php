<?php
include_once '../config/settings.php';
include_once '../user/user.php';
echo "<link  href='$product_header_css_url' rel='stylesheet' type='text/css' />";
class ShopHeader{
    function shopHeader()
    {
        global $user;
        
        ?>
        <body>
            <div class="header_container">
                <div class="logo">
                    <img src="/php/assets/image/products/logo1.png" alt="logo"/>
                </div>
                <div class="element">
                        <div class="button">
                            <a href="">Shop</a>
                        </div>
                        <div class="textname">
                           <h4><?php  
                           echo $name=$user->getCurrentUser();            
                           ?></h4>
                        </div>
                        <div class="cricle">
                            <i class="fa fa-sign-out" aria-hidden="true"><?php $user->logout() ?></i></a>
                        </div>
                        
                    </ul>
                </div>
           </div>
       </body>
       <?php
    }
    function loginHeader(){
        ?>
        
        <body>
            <div class="header_container">
                <div class="logo">
                    <img src="/php/assets/image/products/logo1.png" alt="logo"/>
                </div>
                <div class="element">
                        <div class="button">
                            <a href="">Shop</a>
                        </div>
                        
                    </ul>
                </div>
           </div>
       </body>
       <?php
    }
}
$header = new ShopHeader();
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>