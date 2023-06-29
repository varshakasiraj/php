<?php
include_once 'product.php';
$id = $_GET['id'];
$products = $products_obj->getProcessProduct($id);
var_dump($products);
echo "<link href='" . $singleproduct_css_url . "' rel='stylesheet' type='text/css'/>";
?>
<body>

    <?php
        foreach($products as $iteam)
        {
    ?>
            <div class="container">
                    <div class="card">
                        <div class="image">
                            <?php
						    echo "<img src=" . $iteam["img"] . " alt='bag'/>";
						    ?>
                        </div>
                    </div>
                    <div class="details">
                        <div class="title">
                            <?php
                            echo "<h4>" . $iteam["title"] . "</h4>";
                            ?>
                        </div>
                        <div class="price">
                            <?php
                            echo "<h3><span>&#8377;</span> " . $iteam["price"] . "</h3>";
                            ?>
                        </div>
                        <div class="description">
                            <?php
                                echo " <p>" . $iteam["description"] . "</p>";
                                echo "<h3>" . $iteam["description_tag"] . "</h3>";
                            ?>
                        </div>
                    </div>
            </div>
    <?php
        }
    ?>        
</body>