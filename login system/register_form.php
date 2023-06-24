<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- bootstrap  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="imgcontainer">
        <center><a href="index.html"><img class="mb-5" width="30%" src="upt.jpg" alt="upt" class="avatar"></a></center>
</div>

<h1 class="text-center mb-5">Inregistrare</h1>
   
<div class="container d-flex justify-content-center">

   <form action="" method="post">
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="mb-2 d-flex flex-column">
         <label for="name">Nume</label>
         <input type="text" name="name" required placeholder="Ion Mihai Popescu">
      </div>

      <div class="mb-2 d-flex flex-column">
         <label for="email">Email</label>
         <input type="email" name="email" required placeholder="adresa@email.com">
      </div>

      <div class="mb-2 d-flex flex-column">
         <label for="password">Parola</label>
      <input type="password" name="password" required placeholder="Introdu parola">
      </div>

      <div class="mb-2 d-flex flex-column">
         <label for="cpassword">Confirma parola</label>
      <input type="password" name="cpassword" required placeholder="Confirma parola">
      </div>

      <div class="mb-2 d-flex flex-column">
         <label for="user_type">Tip de user</label>
         <select name="user_type">
            <option value="user">user</option>
            <option value="admin">admin</option>
            <option value="prof">prof</option>
         </select>
      </div>

      <div class="mb-4 d-flex flex-column">
      <input type="submit" name="submit" value="register now" class="form-btn">
      </div>
      <p class="text-center">Ai deja cont? <a href="login_form.php">Click aici !</a></p>

   </form>

</div>

    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>