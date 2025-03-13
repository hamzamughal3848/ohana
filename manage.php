<?php

  include 'conn.php';
  $name = $_POST['name'];
  $srnum = $_POST['srnum'];
  $prize = $_POST['prize'];
  $quantity = $_POST['quantity'];
  $new_prize = $prize * $quantity;
  $sql = "INSERT INTO recipt(name,srnum,prize) values('$name','$srnum','$new_prize')";
  $result = mysqli_query($conn,$sql);


?>
