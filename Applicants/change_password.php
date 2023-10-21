<?php

//To handle session on this page
session_start();

if(empty($_SESSION['appliccants_id'])){
    header("Location:dashboard.php");
}

//Include DB file
require_once("Db.php");

//If user Actually clicked on Login button
if(isset($_POST)){

    //Escape Special Characters in String
    $password = mysqli_real_escape_string($conn, $_POST ['password']);

    //encrypt Password
    $password = base64_encode(strrev(md5($password)));

    //sql query to check user login
    $sql = "UPDATE applicants SET password='$password' WHERE appliccants_id='$_SESSION[appliccants_id]'";
    if($conn->query($sql) === true){
        header("Location: dashboard.php");
        exit();
    }else{
        echo $conn->error;
    }

    //Close database connection. Not compulsory but good practice.
 	$conn->close();
}else{
    //redirect them back to login page if they didn't click login button
    header("Location: settings.php");
    exit();
}
?>