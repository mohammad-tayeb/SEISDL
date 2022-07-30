<?php
include 'logged_in_ins.php';
include 'connection_s.php';

$se = $_SESSION["iuid"];
$strd = "SELECT * FROM instructor Where id='$se'";
$q = mysqli_query($conn, $strd);
$r = mysqli_fetch_array($q);

if (isset($_POST['logout'])) {
  session_start();
  unset($_SESSION["iue"]);
  unset($_SESSION["id"]);
  session_unset();
  header("Location:instructor_login.php");
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="https://localhost/REGISTRATION/instructor_panel.php">I am '<?php echo $r['name'] ?>'</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/instructor_info.php">My Info</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/instructor_project_list.php">Student Project List</a>
        </li>

        <form method="POST" action="">
          <div>
            <input type="submit" class="btn btn-success" name="logout" value="logout" checked>
          </div>
        </form>
        </li>

      </ul>
    </div>
  </nav>








  </div>

</body>

</html>