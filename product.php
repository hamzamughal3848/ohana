<?php
  session_start();
  if(!isset($_SESSION['islogedin']) OR $_SESSION['islogedin']!=true){
    header('Location: http://localhost/ohana/login.php');
    exit;
  }

  include "conn.php";
  $sql = "SELECT * FROM product";
  $result = mysqli_query($conn,$sql);
  $sql = "SELECT * FROM cart";
  $result_2 = mysqli_query($conn,$sql);
  $num_rows = mysqli_num_rows($result_2);
  $SESSION['$row'] = $num_rows;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
        <div id="loader">
    </div>
    <?php include 'loginbanner.php' ?>
    <?php include 'head.php' ?>
    <div class="product">
      <div class="row justify-content-center d-flex">
        <?php while($row = mysqli_fetch_assoc($result)) {
         ?>
        <div class="col-md-3 p-3">
          <div class="card p-2 ">
            <a href="productlink.php?id=<?php echo $row['pid']; ?> "><img src="./images/<?php echo $row['image'] ?>" alt="" class="img-fluid" style="height:325px; width:340px"></a>
            <hr>
            <div class="pro-detail">
              <p class="name"><?php echo $row['name'] ?></p>
              <p class="prize"><?php echo $row['prize'] ?>$</p>

            </div>

          </div>
        </div><?php
        } ?>
      </div>
    </div>
    <?php include 'footer.php' ?>
    <script>
    window.addEventListener("load",function(){
      document.getElementById('loader').style.display = "none";
    })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
