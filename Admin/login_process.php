<?php
include('classes/Db.php');

// Collect POST data
$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$admin= $result->fetch_assoc();

if ($admin&& $password === $admin['password']) {
    // Password is correct, set session variables and redirect to dashboard
    session_start();
    $_SESSION['admin_id'] = $totalPendingCompanyApproval['admin_id'];
    $_SESSION['email'] = $admin['email'];
    header("Location: dashboard.php");
    exit();
} else {
    // Password is incorrect, show error message
    echo "<script>alert('Invalid email or password'); window.location.href = 'index.php';</script>";
}
?>