<?php
    include "conn.php";
    $sql = "SELECT * FROM contact";
    $result = mysqli_query($conn,$sql);
    $num_row = mysqli_num_rows($result);
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
        <div id="loader">
    </div>
    <?php include 'adminnavbar.php'; ?><br>
    <div class="container-fluid p-5">
      <table class="table table-striped  ">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Delete Mail</th>
        </tr><?php while( $row = mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['email'] ?></td>
          <td><?php echo $row['subject'] ?></td>
          <td><?php echo $row['message'] ?></td>
          <td><a href="deletemail.php?id=<?php echo $row['id'] ?>"><button class="btn btn-danger">Delete<button></a></td>
        </tr>
        <?php } ?>
      </table>
    </div>
    <script>
    window.addEventListener("load",function(){
      document.getElementById('loader').style.display = "none";
    })

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
