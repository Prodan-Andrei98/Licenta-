<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['prof_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pagina Profesor</title>

   <!-- bootstrap  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: blueviolet; color:white;"><h3>Bine ai venit <span><?php echo $_SESSION['prof_name'] ?></span></h3></nav>   
<div class="container">

<div class="container">
<h5 class="text-end p-3 mb-3"><a href="logout.php">Logout</a></h5>
<h1 class="text-center mb-5">Studenti Inscrisi</h1>
</div>

<div class="container">
        <table class="table table-hover text-center">
            <thead style="background-color: blueviolet; color:white;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nume</th>
                    <th scope="col">Prenume</th>
                    <th scope="col">Ziua</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Locatie</th>
                    <th scope="col">Sport</th>
                    <th scope="col">Profesor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "config.php";
                    $sql = "SELECT * FROM `inscrisi_std`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nume'] ?></td>
                                <td><?php echo $row['prenume'] ?></td>
                                <td><?php echo $row['ziua'] ?></td>
                                <td><?php echo $row['ora'] ?></td>
                                <td><?php echo $row['locatie'] ?></td>
                                <td><?php echo $row['sport'] ?></td>
                                <td><?php echo $row['prof'] ?></td>
                            </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>

    </div>

    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>