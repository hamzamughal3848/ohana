

<div class="navbar login">
  <ul class="ms-auto top-list">
<?php

  if(!isset($_SESSION['islogedin']) OR $_SESSION['islogedin']!=true){
    ?>
  <li><a href="login.php">Login</a></li>
    <li><a href="signup.php">Sign Up</a></li>
<?php
  }
  else{

?>
    <li class="pt-2"><a href="cart.php">Checkout</a></li>
    <li class="pt-2"><a href="#"><i class="bi bi-cart"></i><?php echo $SESSION['$row']; ?> items</a></li>
    <li ><a href="logout.php"><button type="button" name="button" " class="btn btn-primary">Log OUt</button></a>
<?php
  }
  ?>
    </ul>
            </div>
