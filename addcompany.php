<?php

session_start();

require_once("Db.php");

if(isset($_POST)){

    //escape special character in strings
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']); 
    $website = mysqli_real_escape_string($conn, $_POST['website']); 
    $phone = mysqli_real_escape_string($conn, $_POST['phone']); 
    $logo = mysqli_real_escape_string($conn, $_POST['logo']); 
    $position = mysqli_real_escape_string($conn, $_POST['position']); 
    $employee = mysqli_real_escape_string($conn, $_POST['employee']); 
    $employment = mysqli_real_escape_string($conn, $_POST['employment']); 
    $role = mysqli_real_escape_string($conn, $_POST['role']); 
    $industry = mysqli_real_escape_string($conn, $_POST['industry']); 
    $description = mysqli_real_escape_string($conn, $_POST['description']); 
    $address = mysqli_real_escape_string($conn, $_POST['address']); 
    $lga = mysqli_real_escape_string($conn, $_POST['lga']); 
    $state = mysqli_real_escape_string($conn, $_POST['state']); 
    $active = mysqli_real_escape_string($conn, $_POST['active']);

    //Encrypt Password
    $password = base64_encode(strrev(md5($password)));

    //Sql query to check if email already exist
    $sql = "SELECT email FROM company WHERE email='$email'";
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
                header("Location: register_company.php");
            }
            //sql new registration
            $sql = "INSERT INTO company(fullname, email, password, website, phone, logo, position, employee, employment, role, industry, description, address, lga, state) VALUE ('$fullname', '$email', '$password', '$website', '$phone', '$file', '$position', '$employee', '$employment', '$role', '$industry', '$description', '$address', '$lga', '$state')";

            if($conn->query($sql)===TRUE){
                //If details inserts successfully, then set session variables and redirect to login
                $_SESSION['registration Completed'] = true;
                header("Location: login_company.php");
                exit();
            }else{
                //if details failed to insert then show error.
                echo "Error";
            }
        }else{
            //if email found in database then show email aloready exist
            $_SESSION['registration Error'] = true;
            header("Location: register_company.php");
            exit();
        }

        //close Db connection
        $conn->close();
}else{
    //redirect back to register page if they did not click the register button
    header("Location: register_company.php");
    exit();
}