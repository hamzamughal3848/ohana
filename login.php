<?php
  $login = false;
  $Error = false;
  if(isset($_POST['Accept'])){
  include 'conn.php';
  $U_name = $_POST['user'];
  $U_password = md5($_POST['password']);
  $sql = "SELECT * FROM user WHERE uname='$U_name' AND upassword='{$U_password}'";
  $result = mysqli_query($conn,$sql) or die("query Failed:");
  $num = mysqli_num_rows($result);

  if($num>0){
    $login = true;
    session_start();
    $_SESSION['islogedin'] = true;
    $_SESSION['$_username'] = $U_name;
    header('Location: http://localhost/ohana/index.php');
  }else{
    $Error = true;
  }
} ?>
    <?php
      if($login){
        echo'<div class="alert alert-success">YOUR ACCOUNT IS SUCESSFULLY LOGIN</div>';
      }
     ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <div id="loader">
    </div>
    <?php include 'loginbanner.php' ?>
    <div class="container-fluid form-bg justify-content-center d-flex align-items-center">
      <div class="form text-white">
        <form action="login.php" method="post">
          <?php
            if($Error){
              echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>USER NAME AND PASSWORD IS INCORRECT!</strong>
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>';
            }
           ?>
          <div class="mb-3">
            <label  class="form-label">USER NAME</label>
            <input type="name" class="form-control"name="user"  require>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" require>
          </div>
          <button type="submit" class="btn btn-primary" name="Accept">Submit</button>
        </form>
      </div>
    </div>
    <script>
    window.addEventListener("load",function(){
      document.getElementById('loader').style.display = "none";
    })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
