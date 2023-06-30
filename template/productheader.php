<?php
include_once '../config/settings.php';
echo "<link  href='$product_header_css_url' rel='stylesheet' type='text/css' />";
class ShopHeader{
    function shopHeader()
    {
        ?>
        <head>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>
        <body>
            <div class="header_container">
                <div class="logo">
                    <img src="/php/assets/image/products/logo1.png" alt="logo"/>
                </div>
                <div class="element">
                        <div class="button">
                            <a href="">Shop1    2</a>
                        </div>
                        <div class="cricle">
                            <i class="fa-solid fa-user"></i>
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