<?php

@include 'config.php';
$id= $_GET['id'];
session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

if(isset($_POST['submit'])){
   $nume_prof=$_POST['nume_prof'];
   $prenume_prof=$_POST['prenume_prof'];
   $mail=$_POST['mail'];
   $sporturi_predate=$_POST['sporturi_predate'];

   $sql= "UPDATE `profesori` SET `nume_prof`='$nume_prof',`prenume_prof`='$prenume_prof',`mail`='$mail',`sporturi_predate`='$sporturi_predate' WHERE id=$id";
   $result = mysqli_query($conn,$sql);

   if($result){
      header("Location: prof_tabel.php");
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
         <h3>Editeaza informatii profesor</h3>
         <p class="text-muted">Apasa UPDATE dupa ce ai schimbat informatiile dorite!</p>
      </div>

        <?php 
            $sql="SELECT * FROM `profesori` WHERE id= $id LIMIT 1";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
        ?>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Nume:</label>
                  <input type="text" class="form-control" name="nume_prof" value="<?php echo $row['nume_prof'] ?>">
                  
               </div>
               <div class="col">
                  <label class="form-label">Prenume:</label>
                  <input type="text" class="form-control" name="prenume_prof" value="<?php echo $row['prenume_prof'] ?>">
                  
               </div>

               <div class="mb-3">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control" name="mail" value="<?php echo $row['mail'] ?>">
                  
               </div>

               <div class="mb-3">
                  <label class="form-label">Sporturi predate</label>
                  <input type="text" class="form-control" name="sporturi_predate"  value="<?php echo $row['sporturi_predate'] ?>">
                  
               </div>

               <div>
                  <button type="submit" class="btn btn-success" name="submit">UPDATE</button>
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