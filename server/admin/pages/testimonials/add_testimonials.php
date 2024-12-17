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
    $name = $_POST['name'];
    $description = $_POST['description'];
    $relation = $_POST['relation'];
    $dateCreated = date('Y-m-d H:i:s'); // Current date and time

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Insert into database
            $insertSql = "INSERT INTO testimonials (name, image, description, relation, date_created) VALUES ('$name', '$target', '$description', '$relation', '$dateCreated')";
            mysqli_query($conn, $insertSql);
            header('Location: show_testimonials');
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
    <title>Add testimonial - Oshin Sports Academy</title>
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
                        <h2>Add New testimonial</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Relation</label>
                                <input type="text" class="form-control" name="relation" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            <button type="submit" name="add" class="btn btn-primary">Add Category</button>
                            <a href="show_testimonials" class="btn btn-secondary">Cancel</a>
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