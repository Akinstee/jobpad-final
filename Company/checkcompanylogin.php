<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("classes/db.php");

// var_dump($_POST);

//If user Actually clicked login button 
if(isset($_POST)) {
	$email = $_POST['email'];
	$password = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM company WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$company = $result->fetch_assoc();

if ($company) {
    if ($company['active'] == '2') {
        $_SESSION['companyLoginError'] = "Your Account Is Still Pending Approval By Admin.";
        header("Location: login.php");
        exit();
    } else if ($company['active'] == '0') {
        $_SESSION['companyLoginError'] = "Your Account Is Rejected. Please Contact Admin For More Info.";
        header("Location: login.php");
        exit();
    } else if ($company['active'] == '1') {
        // Check the password here, assuming plain text password in the database
        if ($password === $company['password']) {
            // Password is correct
            $_SESSION['name'] = $company['fullname'];
            $_SESSION['company_id'] = $company['company_id'];
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect
            $_SESSION['companyLoginError'] = "Invalid password.";
            header("Location: login.php");
            exit();
        }
    } else if ($company['active'] == '3') {
        $_SESSION['companyLoginError'] = "Your Account Is Deactivated. Contact Admin For Reactivation.";
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION['companyLoginError'] = "Invalid email.";
    header("Location: login.php");
    exit();
}
//Close database connection. Not compulsory but good practice.
$conn->close();

} else {
	//redirect them back to login page if they didn't click login button
	header("Location: login.php");
	exit();
}

?>