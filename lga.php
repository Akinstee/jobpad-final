<?php
session_start();

require_once("Db.php");

if(isset($_POST)){

    $sql = "SELECT * FROM lga WHERE state_id= '$_POST[id]'";
    $result = $conn->query($sql);

    if($result->num_row > 0){
        while($row = $result->fetch_assoc()){
            echo '<option value=>"'.$row['name'].'" data-id="'.$row["id"].'">'.$row["name"].'</option>';
        }
    }

    $cnn->close();

}

?>