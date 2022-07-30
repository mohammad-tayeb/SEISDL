<?php include 'connection_s.php'; ?>
<?php include 'is_logged_in.php'; ?>

<?php $str = "SELECT name from department";
$q = mysqli_query($conn, $str);

$str = "SELECT name from department";
$k = mysqli_query($conn, $str);

if (isset($_POST['logout'])) {




  session_start();
  unset($_SESSION["username"]);
  unset($_SESSION["useremail"]);
  session_unset();
  header("Location:admin_login.php");
}



if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $dep = $_POST['department'];
  $eml = $_POST['email'];
  $pass = $_POST['id'];



  if (isset($_POST['status'])) {
    $status = 1;
  } else {
    $status = 0;
  }
  $str = "INSERT INTO instructor(name,department,email ,id,status)
    VALUES ('$name','$dep','$eml', '$pass',$status)";

  if (mysqli_query($conn, $str)) {
    echo 'successfully Inserted';
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
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/admin_instructor_add.php">Add Instructor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/admin_instructor_edit.php">Instructor Info</a>
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
    <h2>Add Instractor</h2>

    <form method="POST" action="">
      <div class="form-group">
        <input required="required" type="text" class="form-control" name="name" placeholder="Name">
      </div>




      <div class="form-group">

        <input required="required" type="email" class="form-control" name="email" placeholder="Email">
      </div>
      <div class="form-group">
        <input required="required" type="id" class="form-control" name="id" placeholder="Id">
      </div>
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

      <div class="form-check">

        <input type="checkbox" class="form-check-input" name="status" value="1" checked>
        <label>Active</label>

      </div>

      <div>
        <input type="submit" class="btn btn-success" name="submit" value="Save" checked>
      </div>

    </form>
  </div>
</body>

</html>