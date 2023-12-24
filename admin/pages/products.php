<?php
include '../assets/includes/config.php';

if (!isset($_SESSION['admin']))
  header("Location: ./login.php");

$select = "SELECT * FROM  products";
$result = mysqli_query($conn, $select);
$products = mysqli_fetch_all($result);

include pathOf('admin/assets/includes/header.php');
?>

<div class="body-wrapper">
  <header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-user fs-6"></i>
                  <p class="mb-0 fs-3">My Profile</p>
                </a>
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-mail fs-6"></i>
                  <p class="mb-0 fs-3">My Account</p>
                </a>
                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-list-check fs-6"></i>
                  <p class="mb-0 fs-3">My Task</p>
                </a>
                <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!--  Header End -->
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Add Books</h5>
        <div class="card">
          <div class="card-body">
            <form action="<?= urlOf('admin/assets/api/insertBook.php') ?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="product" class="form-label">Enter Product Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" autofocus>
              </div>
              <div class="mb-3">
                <label for="author" class="form-label">Enter Author name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="author" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" name="price" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="description"></textarea>
                <label for="floatingTextarea">Product Description</label>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Product Image</label>
                <input type="file" accept="image/jpg, image/jpeg, image/png" name="image" class="form-control" id="formFile">
              </div>
              <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
            </form>
          </div>
        </div>
        <div class="row">
          <?php
          for ($i = 0; $i < COUNT($products); $i++) {
          ?>
            <div class="col-md-4">
              <h5 class="card-title fw-semibold mb-6"></h5>
              <div class="card">
                <img src="<?= urlOf('assets/uploaded_img/') . $products[$i][5]  ?>" class="" alt="Can't Show Image" style="align-items:center">
                <div class="card-body">
                  <h5 class="card-title" style="justify-content:center"><?= $products[$i][1] ?></h5>
                  <h5 class="card-title">₹ <?= $products[$i][3] ?>/-</h5>
                  <a href="<?= urlOf('admin/pages/updateBook.php?id=') . $products[$i][0] ?>" class="btn btn-primary">Update</a>
                  <a href="<?= urlOf('admin/assets/api/deleteBook.php?id=') . $products[$i][0] ?>" class="btn btn-danger">Delete</a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php include pathOf('admin/assets/includes/footer.php')  ?>