<?php
    include "config.php";
    $id=$_GET['id'];
    $sql = "DELETE FROM `orar` WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: orar.php");
    }
    else {
        echo "Failed :" . mysqli_error($conn);
    }
?>