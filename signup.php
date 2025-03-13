<?php
  $alert = false;
  $Error = false;
  $exist = false;
  if(isset($_POST['active'])){
  include 'conn.php';
  $U_name = $_POST['uname'];
  $f_name = $_POST['fname'];
  $u_adress = $_POST['uadress'];
  $u_phone = $_POST['uphone'];
  $U_password = md5($_POST['password']) ;
  $c_password = md5($_POST['cpassword']);
  $existsql = "SELECT uname FROM user WHERE uname='$U_name'";
  $exist_result = mysqli_query($conn,$existsql) or die("query Failed:");
  if(mysqli_num_rows($exist_result)>0){
    $exist = true;
  }else{
    if(($U_password == $c_password)){
      $sql = "INSERT INTO user(uname,ufname,uadress,uphone,upassword) values('{$U_name}','{$f_name}','{$u_adress}','{$u_phone}','{$U_password}')";
      $result = mysqli_query($conn,$sql) or die("query Failed:");
      if($result){
        $alert = true;
      }
    }else{
      $Error = true;
    }
  }
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
        <form method="post" action="signup.php">
          <?php
            if($alert){
              echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Your ACCOUNT IS SUCCESSFULLY CREATED</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            if($Error){
               echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>PASSWORD DOES NOT MATCH</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
             }
             if($exist){
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>THIS USER NAME IS ALREADY EXIST</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
              }
           ?>
          <div class="mb-3">
            <label  class="form-label">Full Name</label>
            <input type="text" class="form-control" name="uname" >
          </div>
          <div class="mb-3">
            <label  class="form-label">Father Name</label>
            <input type="text" class="form-control"  name="fname">
          </div>
          <div class="mb-3">
            <label  class="form-label">Adress</label>
            <input type="address" class="form-control" name="uadress" >
          </div>
          <div class="mb-3">
            <label  class="form-label" >Phone Number</label>
            <input type="number" class="form-control" name="uphone" >
          </div>
          <div class="mb-3">
            <label  class="form-label" >Password</label>
            <input type="password" class="form-control" name="password" >
          </div>
          <div class="mb-3">
            <label  class="form-label">Confirm Password</label>
            <input type="password" class="form-control"  name="cpassword">
          </div>
          <button type="submit" type="submit" class="btn btn-primary" name="active">Submit</button>
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
