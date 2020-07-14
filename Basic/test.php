<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <?php 
      $servername = "localhost";
      $username = "root";
      $password = "";
      $db_name = "exercise4";


      $conn = new mysqli($servername, $username, $password, $db_name);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 

     ?>


<form action="test.php" method ="post">
    <p>
       <label  for="userID">User ID:</label>
       <input type="text" name= "userID">
   </p>
   <p>
       <label  for="u_f_name">First Name:</label>
       <input type="text" name= "u_f_name">
   </p>
   <p>
       <label for ="u_l_name">Last Name:</label>
       <input  type="text" name="u_l_name">
   </p>
   <p>
       <label for= "u_email">Email Address:</label>
       <input  type="text" name= "u_email">
   </p>
   <input type= "submit" value="Submit" name = "update">
</form>
<?php

if (count($_POST) > 0){
    $u_userid = $_POST["userID"];
    $u_fName = $_POST["u_f_name"];
    $u_lName = $_POST["u_l_name"];
    $u_mail = $_POST["u_email"];

    $sql_check = $conn->query("SELECT user_id FROM Users WHERE user_id = $u_userid");

    if ($sql_check) {
        if($u_fName != " " and $u_lName != " " and $u_mail != " ") {
        $sql_insert = $conn->query("UPDATE users SET firstname='$u_fName', lastname='$u_lName', email='$u_mail' WHERE user_id=$u_userid");   
         echo "Data update sucessfull.";
        }
        elseif ($u_fName = " "|| $u_lName = " " || $u_mail = " ") {
            echo "Data incomplete. Please fill everything in.";
        };
    }
    else echo "User does not exist.";      
};
?>
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>