<?php


 include "conn.php";
 $pid = $_GET['id'];
 $sql = "DELETE FROM contact WHERE id = '{$pid}'";
 $result = mysqli_query($conn,$sql);
 header('Location: http://localhost/ohana/mail.php');

?>
