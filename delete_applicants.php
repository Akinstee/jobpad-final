<?php 
session_start();

if(empty($_SESSION['admin_id'])){
    header("Location:index.php");
    exit();
}
require_once("Db.php");

if(isset($_GET)){
    //Delete Company using id and redirect
    $sql = "DELETE FROM applicants WHERE applicants_fullname = '$_GET[id]'";
    if($conn->query($sql)){
        header("Location:applicants.php");
        exit();
    }else{
        echo "Error";
    }
}
?>