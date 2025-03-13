<?php
  session_start();

  if(!isset($_SESSION['islogedin']) OR $_SESSION['islogedin']!=true){
    header('Location: http://localhost/ohana/login.php');
    exit;
  }
  $empty =  false;
  include "conn.php";
  $sql = "SELECT * FROM cart";
  $result = mysqli_query($conn,$sql);
  $num_rows = mysqli_num_rows($result);
  $SESSION['$row'] = $num_rows;
  if(isset($_POST['active'])){
    $name = $_POST['name'];
    $srnum = $_POST['srnum'];
    $prize = $_POST['prize'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];
    if(empty($name)){
      $empty =  true;
      header("location: http://localhost/ohana/cart.php");
    }else{
      $exsitsql = "SELECT * FROM recipt WHERE name = '$name'";
      $exist_result = mysqli_query($conn,$exsitsql);
    }
    if(mysqli_num_rows($exist_result)>0){
      header("location: http://localhost/ohana/check.php");
    }else{
      $sql2 = "INSERT INTO recipt(image,name,srnum,prize,quantity) values('$image','$name','$srnum','$prize','$quantity')";
      $result2 = mysqli_query($conn,$sql2);
      header("location: http://localhost/ohana/check.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
        <div id="loader">
    </div>
    <?php include 'loginbanner.php' ?>
    <?php include 'head.php' ?>
    <div class="container-fluid cart-banner">
      <h1><i class="bi bi-cart-dash p-4"></i>Shoping Cart</h1>
    </div>
    <form  action="cart.php" method="post">
    <div class="table">
        <table class="table table-primary table-striped-columns">
          <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Prize</th>
            <th>Quanity</th>
            <th>Delete Item</th>
          </tr>
          <?php while($row = mysqli_fetch_assoc($result)){ ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><img src="./images/<?php echo $row["image"] ?>" style="width:150px; height:100px;"></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["prize"] ?>$</td>
            <td><?php echo $row["quantity"] ?></td>
            <input type="hidden" name="name" value="<?php echo $row["name"] ?>">
            <input type="hidden" name="srnum" value="<?php echo $row["id"] ?>">
            <input type="hidden" name="prize" value="<?php echo $row["prize"] ?>">
            <input type="hidden" name="quantity" value="<?php echo $row["quantity"] ?>">
            <input type="hidden" name="image" value="<?php echo $row["image"] ?>">
            <td><button class="btn btn-warning"><a href="delete.php?id=<?php echo $row["id"] ?>" style="text-decoration:none;color:black;">Delete from cart</a></button></td>
          </tr>
        <?php } ?>
        </table>
    </div>
    <div class="btn-banner">
      <button class="btn btn-primary btn-1"><a href="product.php"><i class="bi bi-arrow-left"></i>Continue Shoping</a></button>
      <button class="btn btn-primary btn-2" type="submit" name="active">Check Out</button>
    </div>
    </form>
    <?php include 'footer.php' ?>
    <script>
    window.addEventListener("load",function(){
      document.getElementById('loader').style.display = "none";
    })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
