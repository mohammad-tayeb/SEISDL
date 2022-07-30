<?php
include 'connection_s.php';
session_start();
if (isset($_SESSION['aue'])) {
  header('Location:admin_panel.php');
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $str = "SELECT * FROM admin Where email='$email' AND password='$password'";
  $q = mysqli_query($conn, $str);
  $rowcount = mysqli_num_rows($q);
  $r = mysqli_fetch_array($q);
  if ($rowcount == 1) {
    $user_name = $r['name'];
    $user_email = $r['email'];
    $user_t = $r['type'];
    $d = '';
    $_SESSION["d"] = $d;
    $_SESSION["aue"] = $user_email;
    $_SESSION["aun"] = $user_name;

    $_SESSION["type"] = $user_t;
    header("Location:admin_panel.php?");
  } else {
    echo 'invalid password of email';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-euiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
  <div class="row mt-3"></div>
  <div class="container">
    <h3>Admin Login</h3>
    <div class="col-md-8">
      <form method="POST" action="">
        <div class="mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div>
          <input type="submit" class="btn btn-lg px-5 btn-success" name="submit" value="Login" checked>
        </div>
      </form>
      <div class="row mt-3"></div>
      <a href="https://localhost/REGISTRATION/login.php">
        <button class="btn btn-outline-dark btn-lg px-4" type="submit">Main Login</button>
      </a>
    </div>

  </div>




</body>

</html>