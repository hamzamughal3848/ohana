<?php
  session_start();
  include "conn.php";
  $sql = "SELECT * FROM cart";
  $result_2 = mysqli_query($conn,$sql);
  $num_rows = mysqli_num_rows($result_2);
  $SESSION['$row'] = $num_rows;
  if(!isset($_SESSION['islogedin']) OR $_SESSION['islogedin']!=true){
    header('Location: http://localhost/ohana/login.php');
    exit;
  }

  $Error = false;
  $success = false;
  include "conn.php";


  $p_id = $_GET['id'];
  $sql = "SELECT * FROM product WHERE pid = '{$p_id}'";
  $result = mysqli_query($conn,$sql);


  if (isset($_POST['Cart'])) {

    $p_id = $_POST['p_id'];
    $p_image = $_POST['p_image'];
    $p_name = $_POST['p_name'];
    $p_prize = $_POST['p_prize'];
    $p_quanity = $_POST['p_quanity'];
    $new_prize = $p_prize * $p_quanity;
    $sql_3 = "SELECT * FROM cart WHERE id = '$p_id'";
    $result_3 = mysqli_query($conn,$sql_3);
    if(mysqli_num_rows($result_3)>0){
      $Error = true;
    }else{
      $sql_2 = "INSERT INTO cart(id,image,name,prize,quantity) values('{$p_id}','{$p_image}','{$p_name}','{$new_prize}','{$p_quanity}')";
      $resul_2 = mysqli_query($conn,$sql_2);
      $success = true;

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
    <?php include 'head.php' ?>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <div class="p-detail">
      <?php if($Error){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>PRODUCT</strong> is alredy addded to cart
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>  ';
      }
      if($success){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>PRODUCT</strong> is succesfully added to cart
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>  ';
      }
      ?>
      <form  action="productlink.php?id=<?php echo $row['pid']; ?>" method="post">
        <div class="row p-5">
        <div class="col-6 justify-content-center d-flex">
          <img src="./images/<?php echo $row['image']; ?>" alt="" style="width:450px;height:400px;">
        </div>
        <div class="col-6 align-self-center">
          <h1><?php echo $row['name']; ?></h1>
          <p class="py-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <p><?php echo $row['prize']; ?>$</p>
          <input type="hidden" name="p_id" value="<?php echo $row['pid']; ?>">
          <input type="hidden" name="p_image" value="<?php echo $row['image']; ?>">
          <input type="hidden" name="p_name" value="<?php echo $row['name']; ?>">
          <input type="hidden" name="p_prize" value="<?php echo $row['prize']; ?>">
          <input type="number" name="p_quanity" value="1" min="1" max="10"><br>
          <button type="submit" class="btn btn-primary my-3" name="Cart">Add To Cart</button>
        </div>
        </div>
      </form>
    </div>
    <?php
   } ?>
    <?php include 'footer.php' ?>
<script>
    window.addEventListener("load",function(){
      document.getElementById('loader').style.display = "none";
    })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
