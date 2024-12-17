<?php
include('../server/admin/database/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $dateCreated = date('Y-m-d H:i:s');

  $insertSql = "INSERT INTO inquiry (name, email, message, date_created) 
                          VALUES ('$name', '$email', '$message', '$dateCreated')";
  mysqli_query($conn, $insertSql);

  header('Location: thankyou_page');
}
?>