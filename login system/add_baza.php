<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

if(isset($_POST['submit'])){
   $baza=$_POST['baza'];

   $sql= "INSERT INTO `baze`(`id`, `baza`) VALUES (NULL,'$baza')";
   $result = mysqli_query($conn,$sql);

   if($result){
      header("Location: admin_page.php");
   }
   else{
      echo "Failed" . mysqli_error($conn);
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- bootstrap  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   <!-- link cu css  -->

</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: blueviolet; color:white;">Adauga locatie</nav>

   <div class="container">
      <div class="text-center mb-4">
         <p class="text-muted">Completeaza spatiile de mai jos pentru a adauga o locatie noua</p>
      </div>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label mb-3">Nume baza:</label>
                  <input type="text" class="form-control mb-3" name="baza" placeholder="Baza X">
               </div>

               <div>
                  <button type="submit" class="btn btn-success" name="submit">Adauga</button>
                  <a href="admin_page.php" class="btn btn-danger">Renunta</a>
               </div>

            </div>
         </form>
      </div>
   </div>

   <!-- bootstrap  -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>