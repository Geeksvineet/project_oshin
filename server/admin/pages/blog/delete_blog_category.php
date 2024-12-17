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

    // Delete the category from the database
    $deleteSql = "DELETE FROM blog_category WHERE id=$id";
    if (mysqli_query($conn, $deleteSql)) {
        header('Location: show_blog_category');
    } else {
        die("Error in SQL query: " . mysqli_error($conn));
    }
} else {
    header('Location: show_blog_category');
}
?>
