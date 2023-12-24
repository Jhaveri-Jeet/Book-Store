<?php
include '../assets/includes/config.php';

if (!isset($_SESSION['admin']))
  header("Location: ./login.php");

$select = "SELECT users.name, orders.amount, orders.quantity, orders.date FROM orders INNER JOIN users ON users.id = orders.user_id ORDER BY orders.id DESC";
$result = mysqli_query($conn, $select);
$orders = mysqli_fetch_all($result);

include pathOf('admin/assets/includes/header.php');
?>

<div class="body-wrapper">
  <!--  Header Start -->
  <header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>

      </ul>

    </nav>
  </header>
  <!--  Header End -->
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Orders</h5>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Sr no.</th>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Quantity</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < COUNT($orders); $i++) { ?>
                <tr>
                  <td><?= $i + 1 ?></td>
                  <td><?= $orders[$i][0] ?></td>
                  <td><?= $orders[$i][1] ?></td>
                  <td><?= $orders[$i][2] ?></td>
                  <td><?= $orders[$i][3] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include pathOf('admin/assets/includes/footer.php')  ?>