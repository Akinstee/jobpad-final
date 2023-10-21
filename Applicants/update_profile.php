<?php

//To Handle Session Variables
session_start();

if(empty($_SESSION['applicants_id'])) {
    header("Location: ../index.php");
    exit();
}

//Include Database Connection from Db file
require_once("../Db.php");

//If Applicants actually clicked on update profile button
if(isset($_POST)){
    //escaping special characters
    $applicant_fullname	= mysqli_real_escape_string($conn, $_POST['fullname']);
    $gender	= mysqli_real_escape_string($conn, $_POST['gender']);
    $email	= mysqli_real_escape_string($conn, $_POST['email']);
    $password	= mysqli_real_escape_string($conn, $_POST['password']);
    $dob	= mysqli_real_escape_string($conn, $_POST['dob']);
    $phone	= mysqli_real_escape_string($conn, $_POST['phone']);
    $address	= mysqli_real_escape_string($conn, $_POST['address']);
    $lga	= mysqli_real_escape_string($conn, $_POST['lga']);
    $state	= mysqli_real_escape_string($conn, $_POST['state']);
    $qualification	= mysqli_real_escape_string($conn, $_POST['qualification']);
    $experience	= mysqli_real_escape_string($conn, $_POST['experience']);
    $skills	= mysqli_real_escape_string($conn, $_POST['skills']);
    $resume	= mysqli_real_escape_string($conn, $_POST['resume']);

    $uploadOk = true;

    if(isset($_FILES)){
        $folder_dir = '../uploads/resume/';
        $base = basename($_FILES['resume']['name']);
        $resumeFileType = pathinfo($base, PATHINFO_EXTENSION);
        $file = uniqid() . "." . $resumeFileType;
        $filename = $folder_dir .$file;

        if(file_exists($_FILES['resume']['tmp_name'])){
            if($_FILES['resume']['size'] < 500000){
                move_uploaded_file($_FILES["resume"]["tmp_name"], $filename);
            }else{
                $_SESSION['uploadError']= "Wrong Size. Max Size Allowed: 5mb";
                header("Location: edit_profile.php");
                exit();
            }
        }else{
            $_SESSION['uploadError'] = "Wrong Format. Only PDF Allowed";
            header("Location: edit_profile.php");
            exit();
        }
    }else{
        $uploadOk = false;
    }
    //Update Apllicant Details
        $sql = "UPDATE applicants SET applicant_fullname='$applicant_fullname', gender='$gender', email='$email', password='$password', dob='$dob', phone='$phone', address='$address', lga='$lag', state='$state', qualification='$qualification', experience='$experience', skills='$skills', resume='$resume'";

        if($uploadOk == true){
            $sql .= ", resume='$file'";
        }
        $sql .= " WHERE applicants_id='$_SESSION[applicants_id]'";
        if($conn->query($sql) == TRUE){
            $_SESSION['name'] = $applicant_fullname;
            header("Location: index.php");
            exit();
        }else{
            echo "Error ".$sql . "<br>" . $conn->error;

            //Close Db connection
            $conn->close();
        }
}else{
    header("Location: edit_profile.php");
    exit();
}

?>