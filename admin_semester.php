<?php
include 'is_logged_in.php';
include 'connection_s.php';

$strd = "SELECT * FROM course";
$l = mysqli_query($conn, $strd);
$stre = "SELECT name from department";
$k = mysqli_query($conn, $stre);

if (isset($_POST['logout'])) {

  session_start();
  unset($_SESSION["aue"]);
  unset($_SESSION["aun"]);
  session_unset();
  header("Location:admin_login.php");
}

if (isset($_POST['submit'])) {
  $dep = $_POST['department'];
  $sem = $_POST['semester'];
  $cor = $_POST['course'];
  $strl = "SELECT * FROM course";
  $ll = mysqli_query($conn, $strl);
  $r_c = mysqli_num_rows($ll);
  if ($r_c == 1) {
    $str = " INSERT INTO course(department,semester)
    VALUES ('$dep','$sem')";

    if (mysqli_query($conn, $str)) {
      echo 'successfully Inserted';
    }
  }
  $strd = "SELECT * FROM course Where department='$dep' and semester='$sem'";
  $q = mysqli_query($conn, $strd);
  $rowcount = mysqli_num_rows($q);

  if ($rowcount == 0) {
    $str = " INSERT INTO course(department,semester,sub)
    VALUES ('$dep','$sem','$cor')";

    if (mysqli_query($conn, $str)) {
      echo 'successfully Inserted';
    }
  } else {
    echo 'Already added in the record';
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
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/admin_semester.php">Add Semester</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/admin_course.php">Add Course</a>
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
    <h2>Add Semester and course</h2>

    <form method="POST" action="">
      <div class="form-group">

        <select required="required" name="department" class="form-control" id="">
          <option value="">Select a Department</option>
          <?php
          while ($row = mysqli_fetch_array($k)) { ?>

            <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
          <?php
          }
          ?>
      </div>


      <div class="form-group">
        <label for="semester">Semester</label>
        <input required="required" type="text" class="form-control" name="semester" placeholder="New Semester(as like. 1st,2nd,3rd......)">
      </div>
      <div class="form-group">
        <label for="course">Course</label>
        <input type="text" class="form-control" name="course" placeholder="New Course">
      </div>
      <div>
        <input type="submit" class="btn btn-success" name="submit" value="Save" checked>
      </div>



    </form>
  </div>
</body>

</html>