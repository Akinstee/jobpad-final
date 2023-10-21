<?php 
session_start();

if(empty($_SESSION['admin_id'])){
    header("Location:index.php");
    exit();
}
require_once("Db.php");

if(isset($_GET)){
    //Reject Company using id and redirect
    $sql = "UPDATE FROM company SET active-'0' WHERE company_id = '$_GET[id]'";
    if($conn->query($sql)){
        header("Location:company.php");
        exit();
    }else{
        echo "Error";
    }
}
?>