<?php require "../assets/includes/config.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Book Ki Dukan</title>
  <link rel="stylesheet" href="<?= urlOf('assets/css/loginStyle.css') ?>">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="container">
    <div class="container-close">📔</div>
    <img src="https://images.unsplash.com/photo-1534670007418-fbb7f6cf32c3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="image">
    <div class="container-text">
      <h2>Book Ki Dukan <br>| Sign In |</h2>
      <br>
      <form action="<?= urlOf('assets/api/insertUser.php') ?>" method="post">
        <input type="text" placeholder="Name : " autofocus name="name" required>
        <input type="number" placeholder="Number : " name="number" required>
        <input type="email" placeholder="Email : " name="email" required>
        <input type="password" placeholder="Password : " name="password" required>
        <br>
        <button type="submit">Register</button>
      </form>
      <a href="<?= urlOf('pages/authentication-login.php') ?>"><span>Have an Account</span></a>
    </div>
  </div>
  <!-- partial -->

</body>

</html>