<?php include 'logged_in_ins.php';
include 'connection_s.php';
if (empty($_REQUEST['dep'])) {
  header("Location:instructor_project_list.php");
}
$id =  $_SESSION["iuid"];
$dep = $_REQUEST['dep'];
$semm = $_REQUEST['sem'];
$corr = $_REQUEST['cor'];

$strd1 = "SELECT * FROM project where department='$dep' and semester='$semm' and course='$corr'";
$l = mysqli_query($conn, $strd1);





$strd = "SELECT * FROM instructor Where id='$id'";
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
    <h3 style="text-align:center;"><?php echo $dep;
                                    echo " ";
                                    echo $semm;
                                    echo " ";
                                    echo $corr; ?></h3>
    <table class="table table-success table-striped">
      <thead>

        <th>ID</th>
        <th>Project Idea</th>
        <th>Description</th>

        <th>Action</th>
      </thead>
      <tbody>
        <?php
        while ($ro = mysqli_fetch_array($l)) { ?>
          <tr>
            <td> <?php echo $ro['id']; ?></td>
            <td> <?php echo $ro['idea']; ?></td>
            <td> <?php echo $ro['description']; ?></td>
            <td> <a href="https://localhost/REGISTRATION/instructor_project_check.php?dep=<?php echo $ro['department'] ?>&amp;sem=<?php echo $ro['semester'] ?>&amp;cor=<?php echo $ro['course'] ?>&amp; id=<?php echo $ro['id'] ?>"><button class="btn btn-outline-dark btn-lg px-5" type="submit"><?php echo $ro['status']; ?></button></a>
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