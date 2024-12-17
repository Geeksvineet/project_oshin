<?php
session_start(); // Start the session
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login/login'); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teachers details - Oshin Sports Academy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <?php include '../../partials/header_link.php' ?>


</head>

<body>



    <div class="container-scroller">

        <?php include '../../partials/_sidebar.php' ?>

        <div class="container-fluid page-body-wrapper">
            <?php include '../../partials/_navbar.php' ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- content -->
                    <?php
                    include('../../database/config.php');

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM teachers WHERE id = $id";
                        $result = mysqli_query($conn, $sql);
                        $blog = mysqli_fetch_assoc($result);
                    }
                    ?>

                    <div class="container mt-5">
                        <h2>Name: <?= $blog['name'] ?></h2>
                        <br>
                        <img src="<?= $blog['image'] ?>" alt="Blog Image" width="300">
                        <br>
                        <p>Designation: <?= $blog['designation'] ?></p>
                        <br>
                        <p>Description: <?= $blog['description'] ?></p>
                        <br>
                        <p>Perspective: <?= $blog['perspective'] ?></p>
                        <br>
                        <p>Phone no.: <?= $blog['phone'] ?></p>
                        <br>
                        <p>Email: <?= $blog['email'] ?></p>
                        <br>
                        <p>Experience: <?= $blog['experience'] ?></p>
                        <br>
                        <p>Social Account: <a href="<?= $blog['social_media_link'] ?>"><?= $blog['social_media_link'] ?></a></p>
                    </div>


                </div>

                <?php include '../../partials/_footer.php' ?>

            </div>
        </div>

    </div>








    <?php include '../../partials/script_links.php' ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>