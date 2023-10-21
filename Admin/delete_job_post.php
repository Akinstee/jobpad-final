<?php 
session_start();

if(empty($_SESSION['admin_id'])){
    header("Location:index.php");
    exit();
}
require_once("Db.php");

if(isset($_GET)){
    //Delete Company using id and redirect
    $sql = "DELETE FROM job_posts WHERE job_post_id = '$_GET[id]'";
    if($conn->query($sql)){
        $sql1 = "DELETE FROM job_applications WHERE job_post_id= '$_GET[id]'";
        if($conn->squery($sql1)){
        }
        header("Location:active_job.php");
        exit();
    }else{
        echo "Error";
    }
}
?>