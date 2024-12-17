<?php
session_start(); // Start the session
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login/login'); // Redirect to login page if not logged in
    exit();
}
?>

<?php
include('../../database/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM gallery_category WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $category = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];

    // Update the category in the database
    $updateSql = "UPDATE gallery_category SET category='$category', description='$description' WHERE id=$id";
    if (mysqli_query($conn, $updateSql)) {
        header('Location: show_gallery_category');
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
    <title>All Blogs - Oshin Sports Academy</title>
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
                        <h2>Edit Gallery Category</h2>
                        <form method="POST">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category" value="<?= $category['category'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required><?= $category['description'] ?></textarea>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update Category</button>
                            <a href="show_gallery_category" class="btn btn-secondary">Cancel</a>
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