<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

if(isset($_POST['submit'])){
   $nume_prof=$_POST['nume_prof'];
   $prenume_prof=$_POST['prenume_prof'];
   $mail_prof=$_POST['mail_prof'];
   $sporturi_predate=$_POST['sporturi_predate'];

   $sql= "INSERT INTO `profesori`(`id`, `nume_prof`, `prenume_prof`, `mail`, `sporturi_predate`) VALUES (NULL,'$nume_prof','$prenume_prof','$mail_prof','$sporturi_predate')";
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
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: blueviolet; color:white;">Adauga profesor</nav>

   <div class="container">
      <div class="text-center mb-4">
         <p class="text-muted">Completeaza spatiile de mai jos pentru a adauga un profesor nou</p>
      </div>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Nume:</label>
                  <input type="text" class="form-control" name="nume_prof" placeholder="Einstein">
               </div>
               <div class="col">
                  <label class="form-label">Prenume:</label>
                  <input type="text" class="form-control" name="prenume_prof" placeholder="Albert">
               </div>

               <div class="mb-3">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control" name="mail_prof" placeholder="Adresa mail">
               </div>

               <div class="mb-3">
                  <label class="form-label">Sporturi predate</label>
                  <input type="text" class="form-control" name="sporturi_predate" placeholder="Fotbal,Culturism">
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