<?php include 'logged_in_ins.php';
include 'connection_s.php';
$id =  $_SESSION["iuid"];

$strd1 = "SELECT * FROM course where ins_id='$id'";
$l = mysqli_query($conn, $strd1);

$strd11 = "SELECT * FROM instructor";
$ke = mysqli_query($conn, $strd11);

$stre = "SELECT  name from department";
$k = mysqli_query($conn, $stre);
$se = $_SESSION["iue"];
$strd = "SELECT * FROM instructor Where email='$se'";
$q = mysqli_query($conn, $strd);
$r = mysqli_fetch_array($q);



if (isset($_POST['logout'])) {

  session_start();
  unset($_SESSION["iue"]);
  unset($_SESSION["iun"]);
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
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/instructor_project_list.php">Student Project List</a>
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
  <div class="container" class="row g-3">
    <h3 style="text-align:center;">Select Course</h3>
    <table class="table table-success table-striped">
      <thead>
        <th>Department</th>
        <th>Semester</th>
        <th>Course</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
        while ($ro = mysqli_fetch_array($l)) { ?>
          <tr>
            <td> <?php echo $ro['department']; ?></td>
            <td> <?php echo $ro['semester']; ?></td>
            <td> <?php echo $ro['sub']; ?></td>

            <td> <a href="https://localhost/REGISTRATION/instructor_project_list_2.php?dep=<?php echo $ro['department'] ?>&amp;sem=<?php echo $ro['semester'] ?>&amp;cor=<?php echo $ro['sub'] ?>"><button class="btn btn-outline-dark btn-lg px-5" type="submit">Go</button></a>
            <td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>















</body>

</html>



</body>

</html>