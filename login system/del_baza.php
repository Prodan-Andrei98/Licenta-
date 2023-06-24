<?php
    include "config.php";
    $id=$_GET['id'];
    $sql = "DELETE FROM `baze` WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: baze_tabel.php");
    }
    else {
        echo "Failed :" . mysqli_error($conn);
    }
?>