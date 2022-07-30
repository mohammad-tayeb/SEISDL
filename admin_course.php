<?php
include 'is_logged_in.php';
include 'connection_s.php';
$strd1 = "SELECT distinct semester FROM course";
$l = mysqli_query($conn, $strd1);

$strd11 = "SELECT * FROM instructor";
$ke = mysqli_query($conn, $strd11);

$stre = "SELECT  name from department";
$k = mysqli_query($conn, $stre);

if (isset($_POST['logout'])) {

  session_start();
  unset($_SESSION["aue"]);
  unset($_SESSION["aun"]);
  session_unset();
  header("Location:admin_login.php");
}
if (isset($_POST['submi'])) {
  $dep = $_POST['department'];
  $strd = "SELECT distinct semester  FROM course where department='$dep'";
  $l = mysqli_query($conn, $strd);
  $_SESSION["d"] = $dep;
  $d = $_SESSION["d"];
}
if (isset($_POST['submit'])) {
  unset($_SESSION["d"]);
  $dep = $_POST['department'];
  $sem = $_POST['sem'];
  $cor1 = $_POST['course'];
  $ai = $_POST['ai'];

  $strd = "SELECT * FROM course Where department='$dep' AND semester='$sem' AND sub='$cor1'";
  $q = mysqli_query($conn, $strd);
  $rowcount = mysqli_num_rows($q);
  $r = mysqli_fetch_array($q);
  if ($rowcount == 0) {

    $str = "INSERT into course(department,semester,sub,ins_id)
  VALUES ('$dep','$sem','$cor1','$ai')
        ";

    if (mysqli_query($conn, $str)) {
      echo 'successfully Inserted';
    }
  } else {
    echo 'course already added';
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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="https://localhost/REGISTRATION/admin_panel.php">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">


        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/admin_instructor_add.php">Add Instructor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/instructor_list.php">Instructor Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/student_list.php">Student List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/admin_student_add.php">Add Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/department.php">Add Department</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/admin_semester.php">Add Semester</a>
        </li>
        <li class="nav-item">
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/admin_course.php">Add Course</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/admin_d_s_c.php">Course Info</a>
        </li>
        
        <li class="nav-item">
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
    <h2>Add A New Course To a exist Semester</h2>

    <form method="POST" action="">
      <div class="form-group">
        <?php
        if (!empty($d)) { ?>
          <select required="required" name="department" class="form-control" id="">
            <option value="<?php echo "$d" ?>"><?php echo "$d" ?></option>
            <?php
            while ($ro = mysqli_fetch_array($k)) {
              if ($d != $ro['name']) { ?>

                <option value="<?php echo $ro['name'] ?>"><?php echo $ro['name'] ?></option>
            <?php
              }
            }
            ?>
          <?php
        } else { ?>
            <select required="required" name="department" class="form-control" id="">
              <option value="">Select a Department</option>
              <?php
              while ($ro = mysqli_fetch_array($k)) { ?>

                <option value="<?php echo $ro['name'] ?>"><?php echo $ro['name'] ?></option>
              <?php
              }
              ?>
            <?php
          }
            ?>
      </div>
      <div>
        <input type="submit" class="btn btn-success" name="submi" value="save" checked>
      </div>
    </form>
    <form method="POST" action="">
      <div class="form-group">

        <select required="required" name="sem" class="form-control" id="">
          <option value="">Select a Semester</option>
          <?php
          while ($row = mysqli_fetch_array($l)) { ?>

            <option value="<?php echo $row['semester'] ?>"><?php echo $row['semester'] ?></option>
          <?php
          }
          ?>

      </div>
      <div class="form-group">
        <label for="course">Course 1</label>
        <input type="text" class="form-control" name="course" placeholder="New Course">
      </div>

      <div class="form-group">

        <input hidden type="text" class="form-control" name="department" value="<?php echo "$d" ?>">
      </div>
      <select required="required" name="ai" class="form-control" id="">
        <option value="">Assiagn Instructor</option>
        <?php
        while ($roe = mysqli_fetch_array($ke)) {
        ?>

          <option value="<?php echo $roe['name'] ?>"><?php echo $roe['name'] ?></option>
        <?php
        }

        ?>

  </div>
  <div>
    <input type="submit" class="btn btn-success" name="submit" value="save" checked>
  </div>
  </form>
  </div>
</body>

</html>