<?php
  session_start();
  if(!isset($_SESSION['islogedin']) OR $_SESSION['islogedin']!=true){
    header('Location: http://localhost/ohana/login.php');
    exit;

  }
  include "conn.php";
  $sql = "SELECT * FROM recipt";
  $result_2 = mysqli_query($conn,$sql);
  $num_rows = mysqli_num_rows($result_2);
  $SESSION['$row'] = $num_rows;
  $sql_recipt = "SELECT * FROM recipt";
  $result = mysqli_query($conn,$sql_recipt);
  $query =  "SELECT SUM(prize) AS sum FROM recipt";
  $result2 = mysqli_query($conn,$query);
  while($row_1 = mysqli_fetch_assoc($result2)){
    $total_prize = $row_1['sum'];
  }
  if(isset($_POST['active'])){
    $o_fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cname = $_POST['cname'];
    $sadress1 = $_POST['sadress1'];
    $sadress2 = $_POST['sadress2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pcode = $_POST['pcode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $image = $_POST['image'];
    $name = $_POST['name'];
    $prize = $_POST['t-prize'];
    $quantity = $_POST['quantity'];
    $new_sql = "SELECT * FROM porder WHERE name = '$name'";
    $c_result = mysqli_query($conn,$new_sql);
    $c_num_rows = mysqli_num_rows($c_result);
    if($c_num_rows>0){
      header('Location: http://localhost/ohana/complete.php');
    }else{
      $sql_ins = "INSERT INTO porder(fname,lname,cname,sadress1,sadress2,city,state,pcode,phone,email,image,name,prize,quantity) values('$o_fname','{$lname}','{$cname}','{$sadress1}','{$sadress2}','{$city}','{$state}','{$pcode}','{$phone}','{$email}','$image','$name','$prize','$quantity') ";
        $re = mysqli_query($conn,$sql_ins);
         header('Location: http://localhost/ohana/completeorder.php');
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
    <div class="row py-5 px-3 container-fluid">
      <div class="col-8">
        <h2>Billing Detail</h2>
        <form class="check-form" action="check.php" method="post" enctype="multipart/form-data">
          <div class="row ">
            <div class="col-6">
              <div class="fname">
                <label for="fname">First Name</label><br>
                <input type="text" name="fname" value="" required>
              </div>
            </div>
            <div class="col-6">
              <div class="lname">
                <label for="lname">Last Name</label><br>
                <input type="text" name="lname" value="" required>
              </div>
            </div>
          </div>
          <br>
          <label for="cname">Company Name(Optional)</label><br>
          <input type="text" name="cname" value=""><br>
          <label for="sadress">Street Adress</label><br>
          <input type="text" name="sadress1" value="" required placeholder="street adress one"><br>
          <input type="text" name="sadress2" value="" class="my-3" placeholder="street adress two"><br>
          <label for="city">Town/City</label><br>
          <input type="text" name="city" value="" required><br>
          <label for="state">State / Countary</label><br>
          <input type="text" name="state" value="" required><br>
          <label for="pcode">Postcode / Zip</label><br>
          <input type="number" name="pcode" value="" required><br>
          <label for="phone">Phone</label><br>
          <input type="number" name="phone" value="" required><br>
          <label for="email">Email Adress</label><br>
          <input type="email" name="email" value="@gmail.com" required><br>

      </div>
      <div class="col-4 recip align-items-center d-flex">
        <div class="container ">
          <div class="recipt-data ">
            <p class="data1">date: <?php echo date('m/d/Y'); ?></p>
            <p class="data2">receipt#</p>
          </div>
          <h1 class="text-center">Receipt</h1>
          <div class="table1 mx-3 my-5">
            <table class="table ">
            <thead>
              <tr>
                <th scope="col">Item detail</th>
                <th scope="col">#</th>
                <th scope="col">Prize</th>
                <th scope="col">Total</th>
              </tr>
            </thead>

            <tbody>
              <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
              <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['srnum'] ?></td>
                <td><?php echo $row['prize'] ?>$</td>
                <td><?php echo $row['prize'] ?>$</td>
              </tr>
              <input type="hidden" name="image" value="<?php echo $row["image"] ?>">
              <input type="hidden" name="name" value="<?php echo $row["name"] ?>">
              <input type="hidden" name="quantity" value="<?php echo $row["quantity"] ?>">
              <?php
                  } ?>
            </tbody>
          </table>
          </div>
          <div class="text-end">
              <pre >Sub Total:   <?php echo $total_prize; ?>$</pre>
              <pre>Shipping:     <?php echo $shiping = 5; ?>$</pre>
          </div>

          <div class="sub-btn container">


              
              <pre class="text-end pb-3 m-5 total" >Total:    <?php echo $sub_total = $total_prize + $shiping ?>$</pre>
              <input type="hidden" name="t-prize" value="<?php echo $sub_total ?>">
              <button  name="active" type="submit" class="btn btn-primary m-5 d-inline-block order-btn">Place Order</button>
              
          </div>

          </form>
        </div>
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
