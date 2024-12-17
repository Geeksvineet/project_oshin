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
    $sql1 = "SELECT image FROM testimonials WHERE id = $id";
    $result = mysqli_query($conn, $sql1);
    $blog = mysqli_fetch_assoc($result);
    unlink($blog['image']);

    // Delete the category from the database
    $deleteSql = "DELETE FROM testimonials WHERE id=$id";
    if (mysqli_query($conn, $deleteSql)) {
        header('Location: show_testimonials');
    } else {
        die("Error in SQL query: " . mysqli_error($conn));
    }
} else {
    header('Location: show_testimonials');
}
?>
