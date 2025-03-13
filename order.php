<?php
    include "conn.php";
    $sql = "SELECT * FROM porder";
    $result = mysqli_query($conn,$sql);



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
      <div id="loader">
    </div>
  <body class="bg-dark">
    <?php include 'adminnavbar.php'; ?>
    <table class="table table-dark table-hover">
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Company Name</th>
        <th>Adress 1</th>
        <th>Adress 2</th>
        <th>City</th>
        <th>State</th>
        <th>Postal Code</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Prodcut Name</th>
        <th>Product Prize</th>
      </tr>
      <?php while($row = mysqli_fetch_assoc($result)){

       ?>
      <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['fname'] ?></td>
        <td><?php echo $row['lname'] ?></td>
        <td><?php echo $row['cname'] ?></td>
        <td><?php echo $row['sadress1'] ?></td>
        <td><?php echo $row['sadress2'] ?></td>
        <td><?php echo $row['city'] ?></td>
        <td><?php echo $row['state'] ?></td>
        <td><?php echo $row['pcode'] ?></td>
        <td><?php echo $row['phone'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['prize'] ?>$</td>
      </tr>
      <?php } ?>
    </table>
   <script>
    window.addEventListener("load",function(){
      document.getElementById('loader').style.display = "none";
    })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
