<?php
require "../assets/includes/config.php";

if (!isset($_SESSION['admin']))
  header("Location: ./pages/login.php");


$select = "SELECT users.name, SUM(cart.price) as amount, cart.date FROM cart INNER JOIN users ON users.id = cart.user_id WHERE users.user_type = 'user' AND date = CURRENT_DATE() LIMIT 5";
$result = mysqli_query($conn, $select);
$orders = mysqli_fetch_all($result);

include pathOf('admin/assets/includes/header.php');
?>

<!--  Main wrapper -->
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
    <!--  Row 1 -->
    <div class="row">
      <div class="col-lg-4 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <div class="mb-4">
              <h5 class="card-title fw-semibold">Recent Carts</h5>
            </div>
            <ul class="timeline-widget mb-0 position-relative mb-n5">
              <?php for ($i = 0; $i < COUNT($orders); $i++) { ?>
                <li class="timeline-item d-flex position-relative overflow-hidden">
                  <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                    <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                  </div>
                  <div class="timeline-desc fs-3 text-dark mt-n1">Payment received from <?= $orders[$i][0]; ?> of Rs <?= $orders[$i][1]; ?> </div>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Recent Carts</h5>
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Id</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Name</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Amount</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Placed On</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i = 0; $i < COUNT($orders); $i++) { ?>
                    <tr>
                      <td class="border-bottom-0">
                        <?= $i + 1 ?>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1"><?= $orders[$i][0]; ?></h6>
                      </td>
                      <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-0 fs-4"><?= $orders[$i][1]; ?></h6>
                      </td>
                      <td class="border-bottom-0">
                        <p class="mb-0 fw-normal"><?= $orders[$i][2]; ?></p>
                      </td>
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
</div>
</div>
<?php include pathOf('admin/assets/includes/footer.php')  ?>