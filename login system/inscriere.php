<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
   header('location:login_form.php');
}

if(isset($_POST['submit'])){
   $nume=$_POST['nume'];
   $prenume=$_POST['prenume'];
   $ziua=$_POST['ziua'];
   $ora=$_POST['ora'];
   $locatie=$_POST['locatie'];
   $sport=$_POST['sport'];
   $prof=$_POST['prof'];

   $sql= "INSERT INTO `inscrisi_std`(`id`,`nume`,`prenume`,`ziua`, `ora`,`locatie`,`sport`,`prof`) VALUES (NULL,'$nume','$prenume','$ziua','$ora','$locatie','$sport','$prof')";
   $result = mysqli_query($conn,$sql);

   if($result){
      header("Location: user_page.php");
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
   <title>Inscriere</title>

   <!-- bootstrap  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   <!-- link cu css  -->

</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: blueviolet; color:white;">Inscrie-te !</nav>

   <div class="container mb-5" >
      <div class="text-center mb-4">
         <p class="text-muted">Completeaza spatiile de mai jos pentru a te inscrie!</p>
      </div>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
         <div class="col">
                  <label class="form-label">Nume:</label>
                  <input type="text" class="form-control" name="nume" placeholder="Ion">
               </div>
         <div class="col">
                  <label class="form-label">Prenume:</label>
                  <input type="text" class="form-control" name="prenume" placeholder="Ionescu">
         </div>         

            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Ziua:</label>
                  <select class="form-select mb-2" aria-label="Default select example" name="ziua">
                     <option selected >Alege ziua</option>
                     <option >Luni</option>
                     <option >Marti</option>
                     <option >Miercuri</option>
                     <option >Joi</option>
                     <option >Vineri</option>
                  </select>
               </div>

               <div class="mb-3">
                  <label class="form-label">Ora:</label>
                  <select class="form-select" aria-label="Default select example" name="ora">
                     <option selected >Alege ora</option>
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
                        <option selected>Alege baza</option>';

                        $sqli = "SELECT * FROM baze";
                        $result = mysqli_query($conn, $sqli);
                        while ($row = mysqli_fetch_array($result)) {
                        echo '<option>'.$row['baza'].'</option>';
                        }

                        echo '</select>';

                      ?>
               </div>

               <div class="mb-3">
                  <label class="form-label">Sport:</label>
                     <?php

                        echo '<select class="form-select" aria-label="Default select example" name="sport">
                        <option selected>Alege sport</option>';

                        $sqli = "SELECT * FROM sporturi";
                        $result = mysqli_query($conn, $sqli);
                        while ($row = mysqli_fetch_array($result)) {
                        echo '<option>'.$row['nume_sport'].'</option>';
                        }

                        echo '</select>';

                      ?>
               </div>

               <div class="mb-3">
                  <label class="form-label">Profesor:</label>
                     <?php

                        echo '<select class="form-select" aria-label="Default select example" name="prof">
                        <option selected>Alege profesor</option>';

                        $sqli = "SELECT * FROM profesori";
                        $result = mysqli_query($conn, $sqli);
                        while ($row = mysqli_fetch_array($result)) {
                        echo '<option>'.$row['nume_prof'].' '.$row['prenume_prof'].'</option>';
                        }

                        echo '</select>';

                      ?>
               </div>

               <div>
                  <button type="submit" class="btn btn-success" name="submit">Adauga</button>
                  <a href="user_page.php" class="btn btn-danger">Renunta</a>
               </div>

            </div>
         </form>
      </div>
   </div>
   <div class="container">
    <h1>Orarul</h1>
        <table class="table table-hover text-center">
            <thead style="background-color: blueviolet; color:white;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ziua</th>
                    <th scope="col">ora</th>
                    <th scope="col">locatie</th>
                    <th scope="col">sport</th>
                    <th scope="col">profesor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "config.php";
                    $sql = "SELECT * FROM `orar` ";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
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