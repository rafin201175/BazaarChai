<?php
require 'config.php';
if(!empty($_SESSION["id"])){
 // header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>


  <nav id="navbar">
      <div class="container">
       <ul>
        <li><h4> BazaarChai </h4></li>
         <li><a href="">Profile</a></li>
         <li><a href="#">Chat</a></li>
            <li><a href="">Edit Profile</a></li>
         <li><a href="">Pending Orders</a></li>
         <li><a href="">Assigned Orders</a></li>
         <li><a href="registration.php">Customers</a></li>
         <li><a href="registration.php">Delivery Man</a></li>
         <a class="logout" href="registration.php">Log Out</a>
       </ul>
      </div>
   </nav>




  <body>

    <div class = "box1">  
    <h1>User Login</h1>

      <form class="" action="" method="post" autocomplete="off">

      <div class= "username">
      <label for="usernameemail">Username or Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value="">
    </div>

       <br><br>

       <div class= "password">
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value="">
      </div>

       <br><br>
      

      <div class="dont">
       <a href="registration.php">Don't have an account?</a><br><br> 
      </div>
      

      <div class = "loginbtn">
      <button type="submit" name="submit">Login</button>
      </div>

    </div>
    
    <br>
    
      <div class ="footer">
      <p>Copyright &copy; 2022 BazaarChai</p>
      </div>

</form>



    
  </body>
</html>