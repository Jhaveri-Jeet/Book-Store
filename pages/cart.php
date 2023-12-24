<?php

require './config.php';

session_start();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

if (!isset($_SESSION['userId']))
  header("Location: ./authentication-login.php");

$cart = mysqli_query($conn, "SELECT products.name, products.price as productPrice, cart.price as cartProductPrice, products.image, cart.quantity, cart.id FROM cart INNER JOIN products ON cart.product_id = products.id;");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Document</title>
</head>

<body>
  <div class="px-4 px-lg-0">
    <!-- For demo purpose -->
    <div class="container text-white py-5 text-center">
      <h1 class="display-4">Book Stack <? echo $user_name; ?></h1>
    </div>
    <!-- End -->
    <div class="pb-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="border-0 bg-light">
                      <div class="p-2 px-3 text-uppercase">Books</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Price</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Quantity</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                      <div class="py-2 text-uppercase">Remove</div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (mysqli_num_rows($cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($cart)) {
                  ?>
                      <tr>
                        <th scope="row">
                          <div class="p-2">
                            <img src="./uploaded_img/<?= $fetch_cart['image'] ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                            <div class="ml-3 d-inline-block align-middle ">
                              <h5 class="mb-0"><a href="#" class="text-dark d-inline-block"><?= $fetch_cart['name'] ?></a></h5>
                            </div>
                          </div>
                        </th>
                        <input type="hidden" id="price" value="<?= $fetch_cart['productPrice'] ?>">
                        <td class="align-middle"><strong>₹</strong><strong id="updatedprice"><?= $fetch_cart['cartProductPrice'] ?></strong></td>
                        <td class="align-middle"><input type="number" id="quantity" value="<?= $fetch_cart['quantity'] ?>" onchange="calculatePriceFromQuantity()" style="border: 0; text-align: center;"></td>
                        <td class="align-middle"><input type="hidden" id="cart_id" value="<?= $fetch_cart['id'] ?>"></td>
                        <td class="align-middle"><a href="delete_cart.php?deleteid=<?= $fetch_cart['id'] ?>" class="text-dark"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
            </ul><a href="checkout.php" class="btn btn-dark rounded-pill py-2 btn-block">Proceed to checkout</a>
            </ul><a href="home.php" class="btn btn-dark rounded-pill py-2 btn-block">Back to Home</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./assets/js/jquery.min.js"></script>
  <script>
    $(init)

    function init() {
      updateTotalPrice();
    }

    function calculatePriceFromQuantity() {
      var price = $("#price").val();
      var quantity = $("#quantity").val();
      var totalPrice = parseInt(price) * parseInt(quantity);
      $("#updatedprice").text(totalPrice);
      updateTotalPrice();
      let data = {
        updatePrice: totalPrice,
        quantity: $("#quantity").val(),
        cartId: $("#cart_id").val(),
      }
      $.post("./assets/api/updatePriceOfCart.php", data, function(response) {
        // window.location.reload();
      })
    }

    function updateTotalPrice() {
      let totalPrice = $("#updatedprice").text();
      let mainTotal;
      mainTotal += parseInt(totalPrice);
      console.log(mainTotal);
      $("#totalPrice").text(mainTotal);
    }
  </script>
</body>

</html>