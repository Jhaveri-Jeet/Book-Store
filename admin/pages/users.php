<?php
include '../assets/includes/config.php';

if (!isset($_SESSION['admin']))
  header("Location: ./login.php");

$select = "SELECT users.name, users.email, users.number, orders.amount FROM orders INNER JOIN users ON users.id = orders.user_id GROUP BY users.name ORDER BY orders.amount";
$result = mysqli_query($conn, $select);
$users = mysqli_fetch_all($result);

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
    </nav>
  </header>
  <!--  Header End -->
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Users</h5>
        <div class="table table-dark table-responsive">
          <table class="table">
            <thead class="table">
              <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Number</th>
                <th scope="col">Total Order Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i = 0; $i < COUNT($users); $i++) { ?>
                <tr>
                  <td><?= $i + 1 ?></td>
                  <td><?= $users[$i][0] ?></td>
                  <td><?= $users[$i][1] ?></td>
                  <td><?= $users[$i][2] ?></td>
                  <td><?= $users[$i][3] ?></td>
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