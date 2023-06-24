<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pagina studenti</title>


      <!-- bootstrap  -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/user_page.php">

</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: blueviolet; color:white;"><h3>Bine ai venit <span><?php echo $_SESSION['user_name'] ?></span></h3></nav>
<div class="container">
<h5 class="text-end p-3 mb-3"><a href="logout.php">Logout</a></h5>
   <div class="text-center">
      <h2 class="mb-4"><a href="orar_stdview.php">Vezi orar</a></h3>
      <h2><a href="inscriere.php">Inscriere</a></h3>
   </div>

</div>
<div>

</div>

    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>