<?php include 'connection_s.php'; ?>


<?php $str = "SELECT name from department";
$k = mysqli_query($conn, $str); ?>
<?php

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $eml = $_POST['email'];
  $id = $_POST['id'];
  $batch = $_POST['batch'];
  $deeep = $_POST['department'];

  if (isset($_POST['status'])) {
    $status = 1;
  } else {
    $status = 0;
  }

  $strd = "SELECT * FROM student Where email='$eml' AND id='$id'";
  $q = mysqli_query($conn, $strd);
  $rowcount = mysqli_num_rows($q);
  $r = mysqli_fetch_array($q);
  if ($rowcount == 0) {
    $str = "INSERT INTO student(name,email ,status,id,batch,department)
    VALUES ('$name','$eml',$status,'$id','$batch','$deeep')";

    if (mysqli_query($conn, $str)) {

      echo 'successfully Inserted';
    }
  } else {
    echo 'id or email alreday used';
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
          <a class="nav-link" href="https://localhost/REGISTRATION/admin_instructor_edit.php">Instructor Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/student_list.php">Student List</a>
        </li>
        <li class="nav-item">
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/admin_student_add.php">Add Student</a>
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
    <h2>Add Student</h2>

    <form method="POST" action="">


      <div class="form-group">

        <input required="required" type="text" class="form-control" name="name" placeholder="Name">
      </div>
      <div class="form-group">

        <input required="required" type="text" class="form-control" name="id" placeholder="Id">
      </div>



      <div class="form-group">
        <input required="required" type="text" class="form-control" name="batch" placeholder="Batch">
      </div>








      <div class="form-group">

        <input required="required" type="email" class="form-control" name="email" placeholder="Email">
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
        <input type="checkbox" class="form-check-input" class="form-control" name="status" value="1" checked>
        <label>Active</label>
      </div>

      <div class="form-group">

        <input type="submit" class="btn btn-lg px-5 btn-success" class="form-control" name="submit" value=" Submit " checked>
      </div>

    </form>

</body>

</html>