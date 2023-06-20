<?php
include_once '../config/settings.php';
$site_url = "/php/productcart/assets/image/";

$css_url = "./assets/css/style.css";
$icon_url = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css";

$products = array(
	array(
		"img" => "/assets/image/bag1.jpg",
		"title" => "Trending",
		"description_tag" => "Handbag Pouch Set",
		"description" => "As absoulte is by amounted repeated entierly ye returned
		These ready timed enjoy might sir yet one since",
		"price" => "$82.00 - $99.00",
		
	),
	array(
		"img" => "/assets/image/highjean.jpg",
		"title" => "Fashion",
		"description_tag" => "Waist Straight jean",
		"description" => "Satchel bags are large bags used for casual occasions. 
		The bag part is a big loose sack connected to a long strap. 
		The strap is usually worn on the shoulder and
		 crossed over the body so the bag rests on the opposite hip",
		"price" => "$123.00",

	),
	array(
		"img" => "/assets/image/bag2.jpg",
		"title" => "Trending",
		"description_tag" => "Butterflies Handbag",
		"description" => "A bucket bag is exactly what the name sounds like. 
		The bag part is in the form of a bucket, with a little less cylindrical shape.
		 It's usually attached to a shoulder strap but can also be attached to a hand strap.
		 The top part is left open or secured by a zipper.",
		"price" => "$199.00",

		
	),
	array(
		"img" => "/assets/image/bag3.jpg",
		"title" => "Fashion",
		"description_tag" => "Handbag Pouch Set",
		"description" => "Barrel bags are long cylindrical bags. They have a lot of room inside.
		 Barrel bags usually have long straps so that the bag comes down to the stomach.",
		"price" => "$200.00",
		
	),
	array(
		"img" => "/assets/image/bag4.jpg",
		"title" => "Trending",
		"description_tag" => "Glory Handbag",
		"description" => "Hobo bags are oval in shape, with a zipper on the top. 
		Small straps are connected to both ends so your shoulder can go through them.
		 This bag usually has many compartments on the inside and a large storage area.e",
		"price" => "$124.00",
		
	),
	array(
		"img" => "/assets/image/bag5.jpg",
		"title" => "Fashion",
		"description_tag" => "Waist Straight jean",
		"description" => "ote bags are perfect for running errands and for going to the beach or pool. They're large squarish bags with small to medium straps. They usually do not have a zipper.
		 Tote bags are usually made from a very durable fabric to resist water and sand.",
		"price" => "$40.00",
		
	)
);
echo "<link href='$css_url' rel='stylesheet' type='text/css'/>";
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
	integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
	<div class='headline'>
		<h1>Products</h1>
		<h4>ShowCase your products in this beautiful shop section</h4>
	</div>
	<div class='container'>
		<div class='wrapper'>
			<?php
			foreach ($products as $iteam) {
				?>
				<div class="card">
					<div class="image">
						<?php
						echo "<img src=" .$site_url . $iteam["img"] . " alt='bag'/>";
						?>
					</div>
					<div class="title">
						<?php
						echo "<h4>"  . $iteam["title"] . "</h4>";
						?>
					</div>
					<div class="description">
						<?php
						echo "<h3>" . $iteam["description_tag"] ."</h3>";
						echo " <p>" . $iteam["description"] ."</p>";
						?>
					</div>
					<div class="price">
						<?php
						echo "<h3>" . $iteam["price"]."</h3>";
						?>
						<i class="fa fa-cart-shopping"></i>
					</div>
					<div class="buy">
						
						<button>Buy now</button>
						
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</body>