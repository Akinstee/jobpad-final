<?php
session_start();

if(empty($_SESSION['applicants_id'])){
    header("Location: index.php");
    exit();
}

require_once("Db.php");

if(isset($_GET)){

    $sql = "SELECT * FROM job_posts WHERE job_post_id='$_GET[id]'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $company_id = $row['company_id'];
    }

    //Check if user has applied for job post or not
    $sql1 = "SELECT * FROM job_applications WHERE applicants_id='$_SESSION[applicants_id]' AND job_post_id='$row[job_post_id]'";
    $result1 = $conn->query($sql1);
    if($result1->num_row == 0){
        
        $sql = "INSERT INTO job_applications(job_post_id, company_id, applicants_id) VALUES ('$_GET[id]', '$company_id', '$_SESSION[applicants_id]')";

        if($conn->query($sql)===TRUE){
            $_SESSION['jobpplySuccess'] = true;
            header("Location: applicants/index.php");
            exit();
        }else{
            echo "Error" . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }else{
        header("Location: jobs.php");
        exit();
    }
}else{
    header("Location: jobs.php");
    exit();
}



?>