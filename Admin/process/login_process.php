<?php
// Start the session
session_start();

// Include the Admin class
require_once("../classes/Admin.php");

// If the login button is clicked
if (isset($_POST['loginbtn'])) {
    // Get the admin's email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create a new Admin object
    $admin = new Admin($email, $password);
    $status = $admin->login();
    

    // Try to login the admin
    if ($status == 1) {

        // Redirect the admin to the dashboard
        header('Location: dashboard.php');
        exit();
    } else {
        // Set an error message in the session
        $_SESSION['login_error'] = 'Invalid email or password.';

        // Redirect the admin back to the login page
        header('Location: index.php');
        exit();
    }
}
?>
