<?php require "../assets/includes/config.php" ?>

<?php
if (!isset($_SESSION['userId']))
    header("Location: ./authentication-login.php");

$id = $_SESSION['userId'];
$select = "SELECT orders.amount, orders.quantity, products.name, products.author, orders.date FROM orders INNER JOIN cart ON cart.id = orders.cart_id INNER JOIN products ON cart.product_id = products.id WHERE orders.user_id = $id ORDER BY orders.id DESC";
$result = mysqli_query($conn, $select);
$orders = mysqli_fetch_all($result);
?>

<?php include pathOf('assets/includes/header.php'); ?>
<!-- Main -->
<div id="main">


    <div class="inner">
        <h1>My Orders</h1>
    </div>
    <div class="inner">
        <table style="text-align: center;">
            <thead>
                <th style="text-align: center;">Sr no</th>
                <th style="text-align: center;">Book Name</th>
                <th style="text-align: center;">Author Name</th>
                <th style="text-align: center;">Quantity</th>
                <th style="text-align: center;">Amount</th>
                <th style="text-align: center;">Date</th>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < COUNT($orders); $i++) { ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $orders[$i][2] ?></td>
                        <td><?= $orders[$i][3] ?></td>
                        <td><?= $orders[$i][1] ?></td>
                        <td><?= $orders[$i][0] ?></td>
                        <td><?= $orders[$i][4] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include pathOf('assets/includes/footer1.php'); ?>
<?php include pathOf('assets/includes/scripts.php'); ?>
<?php include pathOf('assets/includes/footer2.php'); ?>