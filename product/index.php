<?php
include_once 'product.php';
include_once '../template/form.php';
$insert_product = $products_obj->processPostProduct();
$products = $products_obj->getProduct();
echo "<link href='" . $css_url . "' rel='stylesheet' type='text/css'/>";
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
						echo "<img src=" . $iteam["img"] . " alt='bag'/>";
						?>
					</div>
					<div class="title">
						<?php
						echo "<h4>" . $iteam["title"] . "</h4>";
						?>
					</div>
					<div class="description">
						<?php
						echo "<h3>" . $iteam["description_tag"] . "</h3>";
						echo " <p>" . $iteam["description"] . "</p>";
						?>
					</div>
					<div class="price">
						<?php
						echo "<h3><span>&#8377;</span> " . $iteam["price"] . "</h3>";
						?>
						<i class="fa fa-cart-shopping"></i>
					</div>
					<div class="buy">
						<button>Buy now</button>
					</div>
					<div class="template">
						<?php
						echo "<a href='edit.php?id=" . $iteam["id"] . "''style='text-decoration: none;' class='edit'>
							<button>Edit</button></a>";
						?>
						<?php
						echo "<a href='delete.php?id=" . $iteam["id"] . "''style=';' class='delete'>
							<button>Delete</button></a>";
						?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<div class="input_form">
			<center>
				<?php
					$insert_form = $template->data("insertProduct","","","","","");
					if (!empty($insert_product['errors'])) {
						foreach ($insert_product['errors'] as $error) {
							echo "<h5 style='color:red'>" . $error . "</h5><br>";
						}
					} ?>
			</center>

		</div>
	</div>

</body>