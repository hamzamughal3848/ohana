<?php 

	include "conn.php";
	 $sql = "DELETE  FROM cart" ;
	 $result = mysqli_query($conn,$sql);
	 $query = "DELETE  FROM recipt";
	 $result2 = mysqli_query($conn,$query);
	 header('Location: http://localhost/ohana/complete.php');



?>