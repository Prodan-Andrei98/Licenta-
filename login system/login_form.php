<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }

      elseif($row['user_type'] == 'prof'){

         $_SESSION['prof_name'] = $row['name'];
         header('location:prof_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- bootstrap  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="imgcontainer">
        <center><a href="index.html"><img class="mb-5" width="30%" src="upt.jpg" alt="upt" class="avatar"></a></center>
</div>

      <h1 class="text-center mb-5">Logare</h1>

   <div class="container d-flex justify-content-center">   
   <form action="" method="post" >
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="mb-3 d-flex flex-column">
         <label for="email">Email</label>
         <input type="email" name="email" required placeholder="Introdu email">
      </div>
      <div class="mb-3 d-flex flex-column">
      <label for="password">Parola</label>
      <input type="password" name="password" required placeholder="Introdu parola">
      </div>
      <div class="mb-3 d-flex flex-column">
      <input type="submit" name="submit" value="login now" class="form-btn">
      </div>
      <p class="text-center">Nu ai cont? <a href="register_form.php">Click aici !</a></p>
   </form>
   </div>

</div>
    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>