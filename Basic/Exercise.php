<!DOCTYPE html>
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

      $sql = $conn->query("CREATE DATABASE exercise4");

      $sql_insert = $conn->query("CREATE TABLE test_1 (
                                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                        firstname VARCHAR(30) NOT NULL,
                                        lastname VARCHAR(30) NOT NULL,
                                        email VARCHAR(50))");


    ?>

    <form action="Exercise.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Name:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Last Name:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="lastname">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">EMail:</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php 
    
    if (count($_POST) > 0) {
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        
        // $sql = "INSERT INTO test_1(firstname, lastname, email) VALUES ('$name', '$lastname', '$email')";
        if 
        $sql = "UPDATE test_1
                SET firstname = '$name', lastname = '$lastname', email = '$email'
                WHERE firstname = '$name'";

        $result = $conn->query($sql);
    }


    $sql_out = $conn->query("SELECT * FROM test_1");
    ?>

    <table style="border:1">

    <?php
    while ($row = $sql_out->fetch_assoc()) {
        $name = $row["firstname"];
        $lastname = $row["lastname"];
        $email = $row["email"];

    ?>
    <tr>
        <td><?= $name ?></td>
        <td><?= $lastname ?></td>
        <td><?= $email ?></td>
    </tr>

    <?php
    }
    ?>
     </table>
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>