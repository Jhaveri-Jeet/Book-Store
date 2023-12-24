<?php require "../assets/includes/config.php"; ?>

<?php
if (!isset($_SESSION['userId']))
	header("Location: ./authentication-login.php");

$id = $_SESSION['userId'];
$select = "SELECT users.id, users.name, users.number, users.email, users.address, users.password FROM users WHERE users.id = '$id'";
$result = mysqli_query($conn, $select);
$user = mysqli_fetch_all($result);

$selectCurrentOrder = "SELECT SUM(amount) as totalAmount, SUM(quantity) as totalQuantity FROM orders WHERE date = CURRENT_DATE() AND user_id = '$id'";
$resultCurrentOrder = mysqli_query($conn, $selectCurrentOrder);
$currentOrder = mysqli_fetch_all($resultCurrentOrder);

$selectCart = "SELECT products.name, products.author, cart.id, cart.price, cart.quantity FROM cart INNER JOIN products ON products.id = cart.product_id WHERE cart.status = 'NotPurchased' AND cart.user_id = $id";
$resultCart = mysqli_query($conn, $selectCart);
$carts = mysqli_fetch_all($resultCart);

?>



<?php include pathOf('assets/includes/header.php'); ?>
<!-- Main -->
<div id="main">


	<div class="inner">
		<h1>Book Summary</h1>
	</div>
	<div class="inner">
		<table style="text-align: center;">
			<thead>
				<th style="text-align: center;">Book Name</th>
				<th style="text-align: center;">Author Name</th>
				<th style="text-align: center;">Quantity</th>
				<th style="text-align: center;">Price</th>
				<th style="text-align: center;" colspan="2">Action</th>
			</thead>
			<tbody>
				<?php for ($i = 0; $i < COUNT($carts); $i++) { ?>
					<tr>
						<td><?= $carts[$i][0] ?></td>
						<td><?= $carts[$i][1] ?></td>
						<td><?= $carts[$i][4] ?></td>
						<td><?= $carts[$i][3] ?></td>
						<td><a href="<?= urlOf('assets/api/deleteCart.php?id=') . $carts[$i][2] ?>"><span class="fa fa-trash"></span></a></td>
						<td><a href="<?= urlOf("assets/api/insertOrder.php?id=") . $carts[$i][2] . "&amount=" . $carts[$i][3] . "&quantity=" . $carts[$i][4] ?>"><span class="fa fa-check"></span></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<br>
		<div class="inner">
			<h1>Checkout</h1>
		</div>
		<section>
			<form>
				<div class="fields">

					<div class="field half">
						<label for="">Name </label>
						<input type="text" name="name" disabled placeholder="Name" value="<?= $user[0][1] ?>">
					</div>

					<div class="field half">
						<label for="">Email </label>
						<input type="text" name="email" id="field-3" disabled placeholder="Email" value="<?= $user[0][3] ?>">
					</div>

					<div class="field half">
						<label for="">Number </label>
						<input type="text" name="field-4" id="field-4" disabled placeholder="Phone" value="<?= $user[0][2] ?>">
					</div>

					<div class="field half">
						<label for="">Address </label>
						<input type="text" name="field-5" id="field-5" disabled placeholder="Address 1" value="<?= $user[0][4] ?>">
					</div>
					<?php if ($carts != []) { ?>
						<div class="field half">
							<label for="">Total Books Purchased Today </label>
							<input type="text" name="totalQuantity" id="field-5" disabled placeholder="Total Books" value="<?= $currentOrder[0][1] ?>">
						</div>

						<div class="field half">
							<label for="">Total Amount Utilized Today</label>
							<input type="text" name="totalAmount" id="field-5" disabled placeholder="Total Amount" value="<?= $currentOrder[0][0] ?>">
						</div>
					<?php } ?>

					<div class="field half text-right">
						<ul class="actions">
							<?php if ($carts == []) { ?>
								<li><a href="<?= urlOf('pages/user_products.php') ?>"><input type="button" value="Get more Books" class="primary"></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</form>
		</section>
	</div>
</div>
<?php include pathOf('assets/includes/footer1.php'); ?>
<?php include pathOf('assets/includes/scripts.php'); ?>
<?php include pathOf('assets/includes/footer2.php'); ?>