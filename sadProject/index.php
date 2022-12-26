<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  //echo $id;
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}

// if(isset($_POST['order_shift'])){

//     $order = $_POST['order_id'];
//     $result_table = mysqli_query($conn, "SELECT * FROM pending WHERE id = $order");
//     $row_table = mysqli_fetch_assoc($result_table);



//     $orders_add = $_POST['order_id'];
//     $sql_add = "INSERT INTO delivered (id, name, address, phone, items, deliverymanID) 
//     VALUES ('$row_table['id']', '$row_table['name']', '$row_table['address']', '$row_table['phone']', '$row_table['items']', '$row_table['deliverymanID']')";



//     $order = $_POST['order_id'];
//     $sql_del = "DELETE * FROM pending WHERE id = '$order'";
//     $query_run = mysqli_query($conn, $sql_del);


// }



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="index.css">
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
         <a class="logout" href="login.php">Log Out</a>
       </ul>
      </div>

      
   </nav>


  <body>
    <form class="" action="" method="post" autocomplete="off">


    <h1>Welcome <?php echo $row["name"]; ?></h1>
    <h4>ID# <?php echo $row["id"]; ?></h4>
    
 

<!--     <div class="box2">
      Delivery pending 
      <br><br><br>

      Order no. #2313<br>
      Customer name: Rezowan<br>
      Address: Uttara <br><br>


      Order no. #3456<br>
      Customer name: Rafia<br>
      Address: Gazipur
    </div> -->



  <div class="first">
     <h2>Pending Orders</h2>
    <table border="1">
        <thead>
            <tr>
              <th>Oder ID</th>
               <th>Customer Name</th>
                <th>Address</th>
                 <th>Phone</th>
                 <th>Ordered Items</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $sql = "SELECT * FROM pending WHERE deliverymanID = '$id'";
            $result = $conn->query($sql);  

            if(!$result){
              die("Invalid query: " . $conn->error);
            }

            while($row = $result->fetch_assoc()){
              echo "<tr>



              <td>" . $row["id"] . "</td>
              <td>" . $row["name"] . "</td>
              <td>" . $row["address"] . "</td>
              <td>" . $row["phone"] . "</td>
              <td>" . $row["items"] . "</td>
              

             



          

              </tr>";


            }

            ?>
        </tbody>
    </table>
    
  </div>



  <div class="second">
   <h2>Delivered Orders</h2>
       <table border="1">
        <thead>
            <tr>
              <th>Oder ID</th>
               <th>Customer Name</th>
                <th>Address</th>
                 <th>Phone</th>
                 <th>Ordered Items</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $sql = "SELECT * FROM delivered WHERE deliverymanID = '$id'";
            $result = $conn->query($sql);  

            if(!$result){
              die("Invalid query: " . $conn->error);
            }

            while($row = $result->fetch_assoc()){
              echo "<tr>

              <td>" . $row["id"] . "</td>
              <td>" . $row["name"] . "</td>
              <td>" . $row["address"] . "</td>
              <td>" . $row["phone"] . "</td>
              <td>" . $row["items"] . "</td>
             

              </tr>";

            }

            ?>
        </tbody>
    </table>

    
  </div>

    
  </form>

  </body>

  <div class ="footer">
      <p>Copyright &copy; 2022 BazaarChai</p>
      </div>


</html>