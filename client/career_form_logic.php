<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include('../server/admin/database/config.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];
    $position_applying_for = $_POST['position_applying_for'];

    // Handle file upload
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
        $upload_dir = 'uploaded_resumes/'; // Ensure this directory exists
        $file_name = basename($_FILES['resume']['name']);
        $target_file = $upload_dir . uniqid() . '_' . $file_name; // Ensure unique filenames

        // Check file type and size, etc.
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($file_type, ['pdf', 'doc', 'docx'])) {
            // Move the uploaded file to the desired directory
            if (move_uploaded_file($_FILES['resume']['tmp_name'], $target_file)) {
                // Insert form data into the database
                $query = "INSERT INTO career (first_name, last_name, email, phone, address, city, state, zip_code, position_applying_for, resume_file) 
                          VALUES ('$first_name', '$last_name', '$email', '$phone', '$address', '$city', '$state', '$zip_code', '$position_applying_for', '$target_file')";

                mysqli_query($conn, $query);
                header('Location: career#contact_form');
                exit();
            }
        }
    }
}


// Close the connection
mysqli_close($conn);

?>