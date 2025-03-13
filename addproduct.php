<?php
  if(isset($_POST['Accept'])){
    include "conn.php";
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $image_type = $_FILES['image']['name'];
    move_uploaded_file($tmp_name,"images/".$image_name);
    $p_name = $_POST['name'];
    $prize = $_POST['prize'];
    $p_links = $_POST['links'];
    $sql = "INSERT INTO product(image,name,prize) values('{$image_name}','{$p_name}','{$prize}')";
    $result = mysqli_query($conn,$sql);
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
  <body class="bg-dark">
    <?php include 'adminnavbar.php' ?><br>
    <form class="addproduct container-fluid text-white" action="addproduct.php" method="post" enctype="multipart/form-data" c=>
      <label for="image" class="m-2">Upload Product Image</label>
      <input type="file" name="image"><br><br>
      <label for="productname">Enter Product Name</label>
      <input type="text" name="name"> <br><br>
      <label for="prize">Enter Product prize</label>
      <input type="number" name="prize"><br><br>
        <button type="submit" name="Accept" class="btn btn-primary">Submit</button>
    </form>
    <script>
    window.addEventListener("load",function(){
      document.getElementById('loader').style.display = "none";
    })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
