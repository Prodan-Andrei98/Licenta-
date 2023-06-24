<?php
    include "config.php";
    $id=$_GET['id'];
    $sql = "DELETE FROM `sporturi` WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: sport_tabel.php");
    }
    else {
        echo "Failed :" . mysqli_error($conn);
    }
?>