<?php include 'connection_s.php';
session_start();
if (isset($_SESSION['sue'])) {
  header('Location:student_panel.php');
}
?>
<?php
if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $password = $_POST['password'];
  $str = "SELECT * FROM student Where id='$id' AND password='$password'";
  $q = mysqli_query($conn, $str);
  $rowcount = mysqli_num_rows($q);
  $r = mysqli_fetch_array($q);
  if ($rowcount == 1) {
    $user_id = $r['id'];
    $user_name = $r['name'];
    $user_email = $r['email'];
    $user_t = $r['type'];
    $user_d = $r['department'];
    $_SESSION["suD"] = $user_d;
    $_SESSION["suS"] = "";
    $_SESSION["suid"] = $user_id;
    $_SESSION["sue"] = $user_email;
    $_SESSION["sun"] = $user_name;
    $_SESSION["type"] = $user_t;


    header("Location:student_panel.php?");
  } else {
    echo 'invalid password or id';
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
    <h3>Student Login</h3>
    <div class="col-md-8">
      <form method="POST" action="">
        <div class="mb-3">

          <input type="text" class="form-control" name="id" placeholder="ID">
        </div>
        <div class="mb-3">

          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div>

          <input type="submit" class="btn btn-lg px-5 btn-success" name="submit" value="Login" checked>

        </div>
        <div class="row mt-3"></div>
      </form>
      <a href="https://localhost/REGISTRATION/login.php">
        <button class="btn btn-outline-dark btn-lg px-4" type="submit">Main Login</button>
      </a>
    </div>




</body>

</html>