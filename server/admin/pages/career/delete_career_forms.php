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
    $sql1 = "SELECT resume_file FROM career WHERE id = $id";
    $result = mysqli_query($conn, $sql1);
    $blog = mysqli_fetch_assoc($result);
    unlink("./../../../../client/".$blog['resume_file']);

    $sql2 = "DELETE FROM career WHERE id = $id";
    mysqli_query($conn, $sql2);

    header('Location: show_career_forms');
}
