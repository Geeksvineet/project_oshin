<?php
session_start(); // Start the session
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login/login'); // Redirect to login page if not logged in
    exit();
}
?>

<?php
include('../../database/config.php');

if (isset($_POST['add'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Insert the new category into the database
    $insertSql = "INSERT INTO video_gallery_category (category,description) VALUES ('$category','$description')";
    if (mysqli_query($conn, $insertSql)) {
        header('Location: show_video_gallery_category');
    } else {
        die("Error in SQL query: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All  - Oshin Sports Academy</title>
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
                    <div class="container mt-5">
                        <h2>Add New Video Gallery Category</h2>
                        <form method="POST">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                            <button type="submit" name="add" class="btn btn-primary">Add Category</button>
                            <a href="show_video_gallery_category" class="btn btn-secondary">Cancel</a>
                        </form>
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