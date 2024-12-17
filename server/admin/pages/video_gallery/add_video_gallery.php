<?php
session_start(); // Start the session
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login/login'); // Redirect to login page if not logged in
    exit();
}
?>

<?php
include('../../database/config.php');

// Fetch all blog categories for the dropdown
$categoryQuery = "SELECT * FROM video_gallery_category";
$categories = mysqli_query($conn, $categoryQuery);

if (isset($_POST['add'])) {
    $category = $_POST['category'];
    $video_url = $_POST['video_url'];
    $dateCreated = date('Y-m-d H:i:s'); // Current date and time

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Insert into database
            $insertSql = "INSERT INTO video_gallery (image, category_id, video_url, date_created) 
                          VALUES ('$target', '$category', '$video_url', '$dateCreated')";
            mysqli_query($conn, $insertSql);
            header('Location: show_video_gallery');
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Image upload error.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Video gallery - Oshin Sports Academy</title>
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
                        <h2>Add New Video Gallery</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Thumbnail Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="form-group">
                                <label>Youtube Video URL</label>
                                <input type="text" class="form-control" name="video_url" required>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category" required>
                                    <option value="">Select Category</option>
                                    <?php while ($row = mysqli_fetch_assoc($categories)): ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['category'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <button type="submit" name="add" class="btn btn-primary">Add Video Gallery</button>
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