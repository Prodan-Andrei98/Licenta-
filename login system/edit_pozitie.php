<?php

@include 'config.php';
$id= $_GET['id'];
session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

if(isset($_POST['submit'])){
   $ziua=$_POST['ziua'];
   $ora=$_POST['ora'];
   $locatie=$_POST['ora'];
   $sport=$_POST['sport'];
   $prof=$_POST['prof'];

   $sql= "UPDATE `orar` SET `ziua`='$ziua',`ora`='$ora',`ora`='$ora',`sport`='$sport',`prof`='$prof' WHERE id=$id";
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
         <h3>Editeaza informatii profesor</h3>
         <p class="text-muted">Apasa UPDATE dupa ce ai schimbat informatiile dorite!</p>
      </div>

        <?php 
            $sql="SELECT * FROM `orar` WHERE id= $id LIMIT 1";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
        ?>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Ziua:</label>
                  <select class="form-select mb-2" aria-label="Default select example" name="ziua">
                     <option selected disabled>Alege ziua</option>
                     <option >Luni</option>
                     <option >Marti</option>
                     <option >Miercuri</option>
                     <option >Joi</option>
                     <option >Vineri</option>
                  </select>
               </div>
               <div class="mb-3">
                  <label class="form-label">Ora:</label>
                  <select class="form-select" aria-label="Default select example" name="ora" >
                     <option selected disabled>Alege ora</option>
                     <option >08:00</option>
                     <option >10:00</option>
                     <option >12:00</option>
                     <option >14:00</option>
                     <option >16:00</option>
                     <option >18:00</option>
                  </select>
                  
               </div>

               <div class="mb-3">
                  <label class="form-label">Locatie:</label>
                  <?php

                    echo '<select class="form-select" aria-label="Default select example" name="locatie">
                    <option selected disabled>Alege baza</option>';

                    $sqli = "SELECT * FROM baze";
                    $result = mysqli_query($conn, $sqli);
                    while ($row = mysqli_fetch_array($result)) {
                    echo '<option>'.$row['baza'].'</option>';
                    }

                    echo '</select>';

                    ?>
                  
               </div>

               <div class="mb-3">
                  <label class="form-label">Sport</label>
                  <?php

                    echo '<select class="form-select" aria-label="Default select example" name="sport">
                    <option selected disabled>Alege sport</option>';

                    $sqli = "SELECT * FROM sporturi";
                    $result = mysqli_query($conn, $sqli);
                    while ($row = mysqli_fetch_array($result)) {
                    echo '<option>'.$row['nume_sport'].'</option>';
                    }

                    echo '</select>';

                    ?>
                  
               </div>

               <div class="mb-3">
                  <label class="form-label">Profesor</label>
                  <?php

                    echo '<select class="form-select" aria-label="Default select example" name="prof">
                    <option selected disabled>Alege profesor</option>';

                    $sqli = "SELECT * FROM profesori";
                    $result = mysqli_query($conn, $sqli);
                    while ($row = mysqli_fetch_array($result)) {
                    echo '<option>'.$row['nume_prof'].','.$row['prenume_prof'].'</option>';
                    }

                    echo '</select>';

                    ?>
                  
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