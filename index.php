<?php

include "./assets/includes/config.php";

$select = 'SELECT * FROM `products` ORDER BY RAND() LIMIT 6';
$select_products = mysqli_query($conn, $select);
$products = mysqli_fetch_all($select_products);

include pathOf('assets/includes/header.php');

?>

<div id="main">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?= urlOf('assets/images/slider-image-1-1920x700.jpg') ?>" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?= urlOf('assets/images/slider-image-2-1920x700.jpg') ?>" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?= urlOf('assets/images/slider-image-3-1920x700.jpg') ?>" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<br><br>
	<div class="inner">
		<!-- About Us -->
		<header id="inner">
			<h1>Find your new book!</h1>
			<p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>
		</header>

		<br>

		<h2 class="h2">Featured Products</h2>
		<br>
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

		<p class="text-center"><a href="<?= urlOf('pages/user_products.php') ?>">More Books &nbsp;<i class="fa fa-long-arrow-right"></i></a></p>

		<br>
	</div>
</div>

<?php include pathOf('assets/includes/footer1.php'); ?>
<?php include pathOf('assets/includes/scripts.php'); ?>
<?php include pathOf('assets/includes/footer2.php'); ?>