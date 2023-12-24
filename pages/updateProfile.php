<?php require "../assets/includes/config.php"; ?>

<?php
if (!isset($_SESSION['userId']))
    header("Location: ./authentication-login.php");

$id = $_SESSION['userId'];
$select = "SELECT * FROM users WHERE users.id = '$id'";
$result = mysqli_query($conn, $select);
$user = mysqli_fetch_all($result);

?>



<?php include pathOf('assets/includes/header.php'); ?>
<!-- Main -->
<div id="main">


    <div class="inner">
        <h1>Update Profile</h1>
    </div>
    <div class="inner">
        <section>
            <form action="<?= urlOf('assets/api/updateProfile.php') ?>" method="post">
                <div class="fields">

                    <div class="field half">
                        <label for="">Name </label>
                        <input type="text" name="name" placeholder="Name" value="<?= $user[0][1] ?>">
                        <input type="hidden" name="id" placeholder="Name" value="<?= $user[0][0] ?>">
                    </div>

                    <div class="field half">
                        <label for="">Email </label>
                        <input type="text" name="email" placeholder="Email" value="<?= $user[0][3] ?>">
                    </div>

                    <div class="field half">
                        <label for="">Number </label>
                        <input type="text" name="number" placeholder="Phone" value="<?= $user[0][2] ?>">
                    </div>

                    <div class="field half">
                        <label for="">Address </label>
                        <input type="text" name="address" placeholder="Address 1" value="<?= $user[0][4] ?>">
                    </div>

                    <div class="field half">
                        <label for="">Password </label>
                        <input type="text" name="password" placeholder="Address 1" value="<?= $user[0][5] ?>">
                    </div>
                    <div class="field half text-right">
                        <ul class="actions">
                            <li><input type="submit" value="Update Profile" class="primary"></li>
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