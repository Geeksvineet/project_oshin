<?php
session_start(); // Start the session
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login/login'); // Redirect to login page if not logged in
    exit();
}
?>

<?php
include('../../database/config.php');

// Fetch categories for the dropdown
$categorySql = "SELECT * FROM gallery_category";
$categories = mysqli_query($conn, $categorySql);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM gallery WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $blog = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $category = $_POST['category'];

    // Handle image upload
    if ($_FILES['image']['name']) {
        // Path to the old image
        $oldImage = $blog['image'];

        // New image upload
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        // Delete the old image
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        // Move new image to target directory
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $updateSql = "UPDATE gallery SET category='$category', image='$target' WHERE id=$id";
    } else {
        // If image is not updated, keep the old image
        $updateSql = "UPDATE gallery SET category='$category' WHERE id=$id";
    }

    mysqli_query($conn, $updateSql);
    header('Location: show_gallery');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Images - Oshin Sports Academy</title>
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
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Image Category</label>
                                <select class="form-control" name="category" required>
                                    <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                                        <option value="<?= $category['id'] ?>" <?= $category['id'] == $blog['category'] ? 'selected' : '' ?>>
                                            <?= $category['category'] ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Current Image</label>
                                <img src="<?= htmlspecialchars($blog['image']) ?>" alt="Current Image" width="100">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image">
                                <small>Leave blank if you do not want to change the image.</small>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update image</button>
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