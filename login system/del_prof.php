<?php
    include "config.php";
    $id=$_GET['id'];
    $sql = "DELETE FROM `profesori` WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: prof_tabel.php");
    }
    else {
        echo "Failed :" . mysqli_error($conn);
    }
?>