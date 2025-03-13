<?php
  session_start();

  if(!isset($_SESSION['islogedin']) OR $_SESSION['islogedin']!=true){
    header('Location: http://localhost/ohana/login.php');
    exit;
  }
  include "conn.php";

  $sql = "SELECT * FROM cart";
  $result = mysqli_query($conn,$sql);
  $num_rows = mysqli_num_rows($result);
  $SESSION['$row'] = $num_rows;
  if(isset($_POST['active'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $sql_ins = "INSERT INTO contact(name,email,subject,message) values('$name','$email','$subject','$message')";
  $res = mysqli_query($conn,$sql_ins);
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
  <body >
    <div id="loader">
    </div>
    <?php include 'loginbanner.php' ?>
    <?php include 'head.php' ?>
    <div class="row bg-color">
        <div class="col-5 m-5">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d54990.668599034005!2d72.6925312!3d30.523392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1707400050665!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-6 my-4">
          <form class="contact-form"  action="contactus.php" method="post">
            <h1>Contact Us</h1>
            <label for="name">Name</label><br>
            <input type="text" name="name" value="" required><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" value="" required><br>
            <label for="subject">Subject</label><br>
            <input type="text" name="subject" value="" required><br>
            <label for="message">Message</label><br>
            <textarea name="message" rows="8" cols="80"></textarea><br>
            <button type="submit" name="active" class="btn btn-primary">SUBMIT</button>
          </form>
        </div>
    </div>
    <script>
    window.addEventListener("load",function(){
      document.getElementById('loader').style.display = "none";
    })

    </script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
