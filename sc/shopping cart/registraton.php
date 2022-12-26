<?php
@include 'config.php';
if(!empty($_SESSION["id"])){
  //header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $occupation = $_POST["occupation"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password', '$address' , '$occupation')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="registration.css">
  </head>


   <nav id="navbar">
      <div class="container">
       <ul>
         <li><a href="registration.php">Profile</a></li>
         <li><a href="#">Chat</a></li>
            <li><a href="">Edit Profile</a></li>
         <li><a href="">Pending Orders</a></li>
         <li><a href="">Assigned Orders</a></li>
         <li><a href="registration.php">Customers</a></li>
         <li><a href="registration.php">Delivery Man</a></li>
         <a class="logout" href="login.php">Log Out</a>
       </ul>
       <!-- <div class="logo">BazaarChai</div>  -->
      </div>
   </nav>


    <div class = "box2">
    <body>
    <h1>Registration</h1>
    <form class="" action="" method="post" autocomplete="off">

      <label for="name">Full Name : </label>
      <input type="text" name="name" id = "name" required value=""> <br>

      <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value=""> <br>

      <div class="email1">
        <label for="email">Email : </label>
        <input type="email" name="email" id = "email" required value=""> <br>
      </div>
      


      <label for="address">Address : </label>
      <input type="address" name="address" id = "address" required value=""> <br>

      <label for="occupation">Occupation : </label>
      <input type="occupation" name="occupation" id = "occupation" required value=""> <br>




      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>

      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>

      <button type="submit" name="submit">Register</button>
      <br>
      <a href="login.php">Already have an account?</a>

    </div>



      <div class ="footer">
      <p>Copyright &copy; 2022 BazaarChai</p>
      </div>


    </form>
    
    
  </body>
</html>