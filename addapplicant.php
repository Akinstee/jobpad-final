<?php

session_start();

require_once("Db.php");

if(isset($_POST)){

    //escape special character in strings
    $fullname = mysqli_real_escape_string($conn, $_POST['applicant_fullname']); 
    $gender = mysqli_real_escape_string($conn, $_POST['gender']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']); 
    $phone = mysqli_real_escape_string($conn, $_POST['phone']); 
    $address = mysqli_real_escape_string($conn, $_POST['address']); 
    $lga = mysqli_real_escape_string($conn, $_POST['lga']); 
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']); 
    $experience = mysqli_real_escape_string($conn, $_POST['experience']); 
    $skills = mysqli_real_escape_string($conn, $_POST['skills']); 
    $resume = mysqli_real_escape_string($conn, $_POST['resume']); 
    
    // $active = mysqli_real_escape_string($conn, $_POST['active']);

    //Encrypt Password
    $password = base64_encode(strrev(md5($password)));

    //Sql query to check if email already exist
    $sql = "SELECT email FROM applicants WHERE email='$email'";
    $result = $conn->query($sql);

    //if email not found then insert new data
    if($result->num_rows == 0){

        $uploadOk = true;

        //folder where logo/image are saved
        $folder_dir = "uploads/logo/";

        //Getting Basename of file. So if your file location is Documents/New Folder/myResume.pdf then base name will return myResume.pdf
        $base = basename($_FILES['image']['name']);

        $imageFileType = pathinfo($base, PATHINFO_EXTENSION);

        //setting a non repeatable file name, as uniqid will create a unique name based on the current timestamp
        $file = uniqid() . "." . $imageFileType;

        //where files will be saved
        $filename = $folder_dir .$file;

        //check if file is saved to tmp location
        if(file_exists($_FILES['image']['tmp_name'])){

        //check if filetype is allowed
            if($imageFileType == "jpg" ||$imageFIleType == "png"){
                //check file size
                if($_FILES['image']['size'] < 500000){
                    move_uploaded_file($_FILES["image"]['tmp_name'], $filename);
                }else{
                    //size error
                    $_SESSION['uploadError'] = "Wrong Size. Max Size Allowed: 5MB";
                    $uploadOk = false;
                }
            }
        }else {
            //File not copied to temp location error.
            $_SESSION['uploadError'] = "Something Went Wrong. File Not Uploaded. Try Again.";
            $uploadOk = false;
        }

            //for any error, redirect back
            if($uploadOk == false){
                header("Location: register_applicants.php");
            }
            //sql new registration
            $sql = "INSERT INTO applicants(applicant_fullname, gender, email, password, dob, phone, address, lga, state, qualification, experience, skills, resume) VALUE ('$applicant_fullname', '$gender', '$email', '$password', '$dob', '$phone', '$address', '$lga', '$state', '$qualification', '$experience', '$skills', '$resume')";

            if($conn->query($sql)===TRUE){
                //If details inserts successfully, then set session variables and redirect to login
                $_SESSION['registration Completed'] = true;
                header("Location: login_applicants.php");
                exit();
            }else{
                //if details failed to insert then show error.
                echo "Error";
            }
        }else{
            //if email found in database then show email aloready exist
            $_SESSION['registration Error'] = true;
            header("Location: register_applicants.php");
            exit();
        }

        //close Db connection
        $conn->close();
}else{
    //redirect back to register page if they did not click the register button
    header("Location: register_applicants.php");
    exit();
}