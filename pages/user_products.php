<?php

include "../assets/includes/config.php";

$select = 'SELECT * FROM `products`';
$select_products = mysqli_query($conn, $select);
$products = mysqli_fetch_all($select_products);

include pathOf('assets/includes/header.php');
?>
<!-- Main -->
<div id="main">
	<div class="inner">
		<h1>Products</h1>

		<div class="image main">
			<img src="<?= urlOf('assets/images/banner-image-6-1920x500.jpg') ?>" class="img-fluid" alt="" />
		</div>

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
		<br>
	</div>
</div>


<?php include pathOf('assets/includes/footer1.php'); ?>
<?php include pathOf('assets/includes/scripts.php'); ?>
<?php include pathOf('assets/includes/footer2.php'); ?>