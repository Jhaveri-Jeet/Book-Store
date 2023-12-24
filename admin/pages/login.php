<?php require "../assets/includes/config.php"; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | BookKiDukan</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="<?= urlOf('') ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <!-- <img src="../assets/images/logos/dark-logo.svg" width="180" alt=""> -->
                                    <h2>Book Ki Dukan <br />| Admin |</h2>
                                </a>
                                <form action="<?= urlOf('admin/assets/api/checkAdmin.php') ?>" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input type="text" name="name" class="form-control" required placeholder="Enter UserName: " aria-describedby="emailHelp" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-4">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" name="password" required class="form-control" placeholder="Enter Password: ">
                                        </div>
                                        <input type="submit" name="submit" value="Register Admin" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>