<?php
session_start();

require_once("Db.php");

if(empty($_SESSION['appliccants_id'])){
    header("Location: ../index.php");
    exit();
}

if(isset($_POST)){
    $sql = "UPDATE applicants SET active = '?' WHERE appliccants_id='$_SESSION[appliccants_id]'";

    if($conn->query($sql) == TRUE){
        header("Location:../logout.php");
        exit();
    }else{
        echo $conn->error;
    }
}else{
    header("Location: settings.php");
    exit();
}



?>