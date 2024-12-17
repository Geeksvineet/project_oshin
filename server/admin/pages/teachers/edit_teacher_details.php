<?php
session_start(); // Start the session
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login/login'); // Redirect to login page if not logged in
    exit();
}
?>

<?php
include('../../database/config.php');

// Fetch teacher data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM teachers WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $teacher = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    // Get form input data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $designation = $_POST['designation'];
    $perspective = $_POST['perspective'];
    $description = $_POST['description'];
    $experience = $_POST['experience'];
    $social_media_link = $_POST['social_media_link'];

    // Handle image upload if a new one is provided
    if (!empty($_FILES['image']['name'])) {
        $oldImage = $teacher['image'];
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        // Delete old image if it exists
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        // Move the new image to the target directory
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        // Update query with new image
        $updateSql = "UPDATE teachers 
                      SET name='$name', email='$email', phone='$phone', designation='$designation', 
                          perspective='$perspective', description='$description', experience='$experience', social_media_link='$social_media_link', image='$target'
                      WHERE id=$id";
    } else {
        // Update query without changing the image
        $updateSql = "UPDATE teachers 
                      SET name='$name', email='$email', phone='$phone', designation='$designation', 
                          perspective='$perspective', description='$description', social_media_link='$social_media_link', experience='$experience' 
                      WHERE id=$id";
    }

    // Execute the update query
    if (mysqli_query($conn, $updateSql)) {
        header('Location: show_teachers');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher - Oshin Sports Academy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php include '../../partials/header_link.php'; ?>
</head>

<body>
    <div class="container-scroller">
        <?php include '../../partials/_sidebar.php'; ?>
        <div class="container-fluid page-body-wrapper">
            <?php include '../../partials/_navbar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container mt-5">
                        <h2>Edit Teacher Details</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $teacher['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $teacher['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" value="<?= $teacher['phone'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" value="<?= $teacher['designation'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Perspective</label>
                                <input type="text" class="form-control" name="perspective" value="<?= $teacher['perspective'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" value="<?= $teacher['description'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Experience</label>
                                <input type="text" class="form-control" name="experience" value="<?= $teacher['experience'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>social media link</label>
                                <input type="text" class="form-control" name="social_media_link" value="<?= $teacher['social_media_link'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Current Image</label>
                                <img src="<?= $teacher['image'] ?>" alt="Current Image" width="100">
                            </div>
                            <div class="form-group">
                                <label>Change Image</label>
                                <input type="file" class="form-control" name="image">
                                <small>If you want to change the image, select a new file. Leave it blank to keep the current image.</small>
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update Teacher</button>
                        </form>
                    </div>
                </div>
                <?php include '../../partials/_footer.php'; ?>
            </div>
        </div>
    </div>
    <?php include '../../partials/script_links.php'; ?>
</body>

</html>
