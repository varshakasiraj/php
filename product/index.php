<?php
include_once 'product.php';
/*$insert=$products_obj->insertProduct("bag6.jifi","Trending","chessboard handbag","Totes are a casual style of handbag without a top closure,
ideal for everything from travel to a day at the beach. Style editors at “Oprah”
magazine recommend looking for a bag about the size of a cereal box to ensure you have enough 
room.","$25.00");*/
$insert=$products_obj->processPostProduct();
$products = $products_obj->getProduct();
echo "<link href='".$css_url."' rel='stylesheet' type='text/css'/>";
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
	integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
	crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
	<div class='headline'>
		<h1>Products</h1>
		<h4>ShowCase your products in this beautiful shop section</h4>
	</div>
	
	<div class="input_form">
		<center>
			<form id="product_input" method="POST" action="<?php $site_url."/product"?>" enctype="multipart/form-data">
				<table>
					<tr>
						<td><label for="img" >img</label></td>
						<td><input type="file" id="img" name="img"/></td>
					</tr>
					<tr>
						<td><label for="title" >title</label></td>
						<td><input type="text" id="title" name="title"/></td>
					</tr>
					<tr>
						<td><label for="description_tag" >description_tag</label></td>
						<td><input type="text" id="description_tag" name="description_tag"/></td>
					</tr>
					<tr>
						<td><label for="description">description</label></td>
						<td><textarea name="description" id="description"></textarea></td>
					</tr>
					<tr>
						<td><label for="price">price</label></td>
						<td><input type="text" id="price" name="price"/></td>
					</tr>
					<tr >
						<td colspan="1"></td>
						<td><input type="submit" name="submit" value="submit"/></td>
					</tr>
				</table>
				<input type="hidden" name="formaction"  value="insertProduct" />
			</form>
		</center>
    </div>
	<div class='container'>
		<div class='wrapper'>
			<?php
			foreach ($products as $iteam) {
				?>
				<div class="card">
					<div class="image">
						<?php
						echo "<img src=" .$image_path . $iteam["img"] . " alt='bag'/>";
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