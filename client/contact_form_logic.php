<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include('../server/admin/database/config.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $program = $_POST['program'];
    $message = $_POST['message']; // Sanitize email input
    $dateCreated = date('Y-m-d H:i:s'); // Current date and time

    $insertSql = "INSERT INTO contact (name, email, phone, program, message, date_created) 
                      VALUES ('$name', '$email', '$phone', '$program', '$message', '$dateCreated')";

    mysqli_query($conn, $insertSql);
    header('Location: contact#contact_form');
    exit();
}

// Close the connection
mysqli_close($conn);

?>
