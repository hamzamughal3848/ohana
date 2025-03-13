<?php


 include "conn.php";
 $pid = $_GET['id'];
 $sql = "DELETE FROM cart WHERE id = '{$pid}'";
 $result = mysqli_query($conn,$sql);
 $query = "DELETE FROM recipt WHERE srnum = '{$pid}'";
 $result2 = mysqli_query($conn,$query);
 header('Location: http://localhost/ohana/cart.php');

?>
