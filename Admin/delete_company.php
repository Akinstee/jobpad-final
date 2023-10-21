<?php 
session_start();

if(empty($_SESSION['admin_id'])){
    header("Location:index.php");
    exit();
}
require_once("Db.php");

if(isset($_GET)){
    //Delete Company using id and redirect
    $sql = "DELETE FROM company WHERE company_id = '$_GET[id]'";
    if($conn->query($sql)){
        header("Location:company.php");
        exit();
    }else{
        echo "Error";
    }
}
?>