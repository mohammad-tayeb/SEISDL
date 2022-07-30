<?php
include 'is_logged_in.php';
include 'connection_s.php';
$strd1 = "SELECT * FROM course";
$l = mysqli_query($conn, $strd1);




if (isset($_POST['logout'])) {

  session_start();
  unset($_SESSION["aue"]);
  unset($_SESSION["aun"]);
  session_unset();
  header("Location:admin_login.php");
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
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/admin_d_s_c.php">Course Info</a>
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
    <h2>Course Information</h2>
    <table class="table table-striped">
      <thead>
        <th>Department</th>
        <th>Semester</th>
        <th>Course</th>
        <th>Assienged Instructor Id</th>
        <th>Edit</th>



      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_array($l)) { ?>
          <tr>
            <td><?php echo $row['department'] ?></td>
            <td><?php echo $row['semester'] ?></td>
            <td><?php echo $row['sub'] ?></td>
            <td><?php echo $row['ins_id'] ?></td>
            <td><a href="https://localhost/REGISTRATION/admin_d_s_c_edit.php?dep=<?php  echo $row['department'] ?>&amp;sem=<?php echo $row['semester']?>&amp;cor=<?php echo $row['sub'] ?>">
                <button class="btn btn-outline-dark btn-lg px-3" type="submit">Edit</button>
              </a></td>
            
</tr>

        <?php } ?>



        </tboady>
    </table>
    



  </div>
</body>

</html>