<?php
include 'is_logged_in.php';
include 'connection_s.php';

if (isset($_POST['logout'])) {

  session_start();
  unset($_SESSION["aue"]);
  unset($_SESSION["aun"]);
  session_unset();
  header("Location:admin_login.php");
}

if (isset($_POST['submit'])) {

  $dep = $_POST['department'];
  $phn = $_POST['phone'];
  $add = $_POST['add'];
  $code = $_POST['code'];
  if (isset($_POST['status'])) {
    $status = 1;
  } else {
    $status = 0;
  }

  $strd = "SELECT * FROM department Where name='$dep' or code=$code";
  $q = mysqli_query($conn, $strd);
  $rowcount = mysqli_num_rows($q);

  if ($rowcount == 0) {
    $str = "INSERT INTO department (name,code,status,phone,address)
      VALUES ('$dep',$code,$status,'$phn','$add')";
    if (mysqli_query($conn, $str)) {
      echo 'successfully Inserted';
    }
  } else {
    echo 'The department is already in record or you used a duplictae department code';
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
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/department.php">Add Department</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/admin_semester.php">Add Semester</a>
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
    <h2>Add Department</h2>

    <form method="POST" action="">
      <div class="form-group">
        <label for="department">Department</label>
        <input required="required" type="text" class="form-control" name="department" placeholder="Department Name">
      </div>
      <div class="form-group">
        <label for="add">Department Address</label>
        <input required="required" type="text" class="form-control" name="add" placeholder="Enter Department Address">
      </div>
      <div class="form-group">
        <label for="phone">Department Phone</label>
        <input required="required" type="text" class="form-control" name="phone" placeholder="Department Phone">
      </div>
      <div class="form-group">
        <label for="code">Department Code</label>
        <input required="required" type="text" class="form-control" name="code" placeholder="Department code">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" class="form-control" name="status" value="1" checked>
        <label>Active</label>


        <div>
          <input type="submit" class="btn btn-success" name="submit" value="Save" checked>
        </div>


    </form>
  </div>
</body>

</html>