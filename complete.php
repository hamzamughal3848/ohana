<?php
  session_start();

  if(!isset($_SESSION['islogedin']) OR $_SESSION['islogedin']!=true){
    header('Location: http://localhost/ohana/login.php');
    exit;
  }

  include "conn.php";
  $sql = "SELECT * FROM porder";
  $result = mysqli_query($conn,$sql);
  $num_rows = mysqli_num_rows($result);
  $SESSION['$row'] = $num_rows;

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <div id="loader">
    </div>
    <?php include 'loginbanner.php' ?>
    <?php include 'head.php' ?>
    <div class="container   ">
      <div class="row   text-center my-5">
        <h1>Your order is under proceecing!Thank You</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
      </div>
    </div>
    <div class="container-fluid">
      <div class="table px-5">
          <table class="table table-primary table-striped-columns">
            <tr>
              <th>Id</th>
              <th>Image</th>
              <th>Name</th>
              <th>Prize</th>
              <th>Quanity</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>             
              <td><?php echo $row['id'] ?></td>
              <td><img src="./images/<?php echo $row['image'] ?>"></td>
              <td><?php echo $row['name'] ?></td>
              <td><?php echo $row['prize'] ?></td>
              <td><?php echo $row['quantity'] ?></td>
            </tr>
            <?php } ?>
          </table>
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
