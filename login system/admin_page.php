<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pagina admin</title>

   <!-- bootstrap  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: blueviolet; color:white;">Pagina admin</nav>
   <h5 class="text-end p-3 mb-3"><a href="logout.php">Logout</a></h5>
   <div class="container d-flex justify-content-center">
      <div class="text-center mb-3">
         <h2><a href="add_prof.php">Adauga profesori</a></h3>
         <h2><a href="prof_tabel.php">Vezi profesori</a></h2>
         <h2><a href="add_sport.php">Adauga sport</a></h2>
         <h2><a href="sport_tabel.php">Vezi sporturi</a></h2>
         <h2><a href="add_baza.php">Adauga locatie(baza)</a></h2>
         <h2><a href="baze_tabel.php">Vezi locatii(baze)</a></h2>
         <h2><a href="add_pozitie.php">Adauga pozitie</a></h2>
         <h2><a href="orar.php">Vezi orar</a></h2>
      </div>   
   </div>

   <!-- bootstrap  -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>