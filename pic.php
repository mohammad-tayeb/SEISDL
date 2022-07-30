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
  unset($_SESSION["d"]);

  $sem = $_POST['id'];
  $cor1 = $_POST['picture'];

  $filename = $_FILES['image']['name'];

  // Select file type
  $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  // valid file extensions
  $extensions_arr = array("jpg", "jpeg", "png", "gif");

  // Check extension
  if (in_array($imageFileType, $extensions_arr)) {

    // Upload files and store in database
    if (move_uploaded_file($_FILES["image"]["tmp_name"], 'upload/' . $filename)) {
      $str = "INSERT into picture (id,picture)
  VALUES ('$sem','$cor1')";

      if (mysqli_query($conn, $str)) {
        echo 'successfully Inserted';
      }
    }
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
          <a class="nav-link" href="https://localhost/REGISTRATION/instructor_list.php">Edit My Info</a>
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
    <h2>Add New Course</h2>

    <form method="POST" action="" enctype='multipart/form-data'>

      <div class="form-group">
        <label for="picture">pic</label>
        <input type="file" class="form-control" name="picture" multiple>
      </div>
      <div class="form-group">
        <label for="id">Course 1</label>
        <input type="text" class="form-control" name="id" placeholder="New Course">
      </div>

      <div class="form-group">

        <input hidden type="text" class="form-control" name="department" value="<?php echo "$d" ?>">
      </div>



      <div>
        <input type="submit" class="btn btn-success" name="submit" value="save" checked>
      </div>
    </form>
  </div>
</body>

</html>