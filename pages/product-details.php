<?php
include '../assets/includes/config.php';

if (!isset($_SESSION['userId']))
	header("Location: ./authentication-login.php");

$id = $_GET['id'];

$selectSingleProduct = "SELECT * FROM `products` WHERE id = $id";
$singleProduct = mysqli_query($conn, $selectSingleProduct);
$selectedProduct = mysqli_fetch_all($singleProduct);
print_r($selectedProduct);

$selectProductQuery = 'SELECT * FROM `products` ORDER BY RAND() LIMIT 3';
$select_products = mysqli_query($conn, $selectProductQuery);
$products = mysqli_fetch_all($select_products);

include pathOf('assets/includes/header.php');
?>

<!-- Main -->
<div id="main">
	<div class="inner">
		<h1><?= $selectedProduct[0][1] ?><span class="pull-right" id="newPriceTag"><?= $selectedProduct[0][3] ?> /-</span></h1>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-5">
					<img src="<?= urlOf('assets/uploaded_img/') . $selectedProduct[0][5] ?>" class="img-fluid" alt="">
				</div>

				<div class="col-md-7">
					<p><?= $selectedProduct[0][4] ?></p>
					<div class="row">
						<div class="col-sm-8">
							<label class="control-label">Quantity</label>
							<div class="row">
								<form action="<?= urlOf('assets/api/insertCart.php') ?>" method="post">
									<div class="col-sm-6">
										<div class="form-group">
											<input type="number" name="quantity" id="quantity" value="1" onchange="calculateNewPrice()">
											<input type="hidden" id="newPrice" name="newPrice">
											<input type="hidden" name="id" value="<?= $selectedProduct[0][0] ?>">
											<input type="hidden" id="oldPrice" value="<?= $selectedProduct[0][3] ?>">
										</div>
									</div>
									<div class="col-sm-6">
										<input type="submit" class="primary" value="Add to Cart">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br>
		<br>

		<div class="container-fluid">
			<h2 class="h2">Similar Products</h2>

			<!-- Products -->
			<section class="tiles">
				<?php for ($i = 0; $i < COUNT($products); $i++) { ?>
					<article class="style1">
						<span class="image">
							<img src="<?= urlOf('assets/uploaded_img/') . $products[$i][5] ?>" alt="" />
						</span>
						<a href="<?= urlOf('pages/product-details.php?id=') . $products[$i][0] ?> ">
							<h2><?= $products[$i][1] ?></h2>

							<p><strong>₹ <?= $products[$i][3] ?></strong></p>

							<p>Author : <?= $products[$i][2] ?></p>
						</a>
					</article>
				<?php } ?>
			</section>
			<p class="text-center"><i class="fa fa-long-arrow-left"></i>&nbsp;<a href="<?= urlOf('') ?>">Discover More</a></p>
		</div>
	</div>
</div>
<?php include pathOf('assets/includes/footer1.php'); ?>
<?php include pathOf('assets/includes/scripts.php'); ?>

<script>
	$(init);

	function init() {
		calculateNewPrice();
	}

	function calculateNewPrice() {
		let oldPrice = $("#oldPrice").val();
		let newPrice = $("#newPrice").val(oldPrice);
		$("#newPriceTag").text("₹ " + oldPrice);

		let quantity = $("#quantity").val();
		let price = quantity * oldPrice;
		$("#newPrice").val(price);
		$("#newPriceTag").text("₹ " + price);
	}
</script>

<?php include pathOf('assets/includes/footer2.php'); ?>