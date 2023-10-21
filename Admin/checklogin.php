<?php

session_start();

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=jobpad', 'root', '');

// Get the user's input
//$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the user exists in the database
$sql = 'SELECT * FROM admin WHERE email = :email AND password = :password';
$stmt = $db->prepare($sql);
//$stmt->bindParam(':fullname', $fullname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

$user = $stmt->fetch();

// If the user exists, log them in and redirect them to the dashboard
if ($admin) {
    $_SESSION['admin_id'] = $admin['id'];
    header('Location: dashboard.php');
    exit();
} else {
    // If the user does not exist, display an error message
    $_SESSION['loginError'] = true;
    header('Location: checklogin.php');
    exit();
}
