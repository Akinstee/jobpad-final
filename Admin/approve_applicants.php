<?php 
session_start();

if(empty($_SESSION['admin_id'])){
    header("Location:index.php");
    exit();
}
require_once("Db.php");

if(isset($_GET)){
    //UPDATE Applicants using id and redirect
    $sql = "UPDATE FROM applicants SET active-'1' WHERE applicants_id = '$_GET[id]'";
    if($conn->query($sql)){
        header("Location:Applicants.php");
        exit();
    }else{
        echo "Error";
    }
}
?>