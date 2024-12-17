<?php
include('../../database/config.php');
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check for user in the database (use your actual admin table and password field)
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin_logged_in'] = true; // Set session for the logged-in user
        $_SESSION['admin_username'] = $email; // Store admin username in session

        header('Location: ../../index'); // Redirect to the admin dashboard (or any other page)
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Oshin Sports Academy Admin</title>

    <?php include '../../partials/header_link.php' ?>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="../../assets/images/logo-dark.png">
                            </div>
                            <h6 class="font-weight-dark">Admin Login</h6>

                            <?php if (isset($error_message)): ?>
                                <div class="alert alert-danger"><?= $error_message ?></div>
                            <?php endif; ?>

                            <form method="POST" action="login">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <?php include '../../partials/script_links.php' ?>
</body>

</html>