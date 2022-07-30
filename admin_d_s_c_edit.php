<?php
include 'is_logged_in.php';
include 'connection_s.php';
$dep=$_REQUEST['dep'];
$semm=$_REQUEST['sem'];$cor=$_REQUEST['cor'];
$strd1 = "SELECT * FROM course Where department='$dep'and semester='$semm'and sub='$cor'";
$l = mysqli_query($conn, $strd1);
$str11 = "SELECT * from instructor";
$q = mysqli_query($conn, $str11);

if (isset($_POST['submit'])) {
  $ins = $_POST['ins'];


  $st12 = "SELECT ins_id FROM course WHERE ins_id='$ins';";
  $r1 = mysqli_query($conn, $st12);
  $rowcount = mysqli_num_rows($r1);

  if ($rowcount <= 2) {
    $strq = "UPDATE course SET ins_id='$ins' Where department='$dep'and semester='$semm'and sub='$cor'";
    if (mysqli_query($conn, $strq)) {
      echo 'successfully updatted';
      header('Location:admin_d_s_c.php');
    }
  } else {
    echo 'already assienged two against this id';
  }
}
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
  <form method="POST" action="">
    <div class="container" class="row g-3">
      <h2>Course Information</h2>
      <table class="table table-striped">
        <thead>
          <th>Department</th>
          <th>Semester</th>
          <th>Course</th>
          <th>Assienged Instructor Id/Name</th>



        </thead>
        <tbody>
          <?php
          $row = mysqli_fetch_array($l) ?>
            <tr>
              <td><?php echo $row['department'] ?></td>
              <td><?php echo $row['semester'] ?></td>
              <td><?php echo $row['sub'] ?></td>
              <td>
                <div>
                  <?php

                  if ($row['ins_id'] == "") { ?>
                    <div class="form-group">

                      <select style="text-align:center; background-color: #b8d6cf" required="required" name="ins" class="form-control" id="ins">
                        <option style="text-align:center; background-color: #b8d6cf" value="">Select</option>
                        <?php
                        $str11 = "SELECT * from instructor";
                        $q = mysqli_query($conn, $str11);
                        while ($r = mysqli_fetch_array($q)) { ?>

                          <option value="<?php echo $r['id']; ?>"><?php echo $r['name'];
                                                                  echo $r['id']; ?></option>
                        <?php
                        }
                        ?>

                    </div>
                  <?php

                  } else {
                  ?>
                    <div class="form-group">
                      <?php
                      $iiid = $row['ins_id'];
                      $str = "SELECT * from instructor where id='$iiid'";
                      $q1 = mysqli_query($conn, $str);
                      $r1 = mysqli_fetch_array($q1) ?>
                      <select style="text-align:center; background-color: #b8d6cf" required="required" name="ins" class="form-control" id="ins">
                        <option style="text-align:center; background-color: #b8d6cf" value="<?php echo $row['ins_id'] ?>"><?php echo $r1['name'];
                                                                                                                          echo ' ';
                                                                                                                          echo $row['ins_id']; ?></option>
                        <?php
                        $str11 = "SELECT * from instructor";
                        $q = mysqli_query($conn, $str11);
                        while ($r = mysqli_fetch_array($q)) {
                          if ($row['ins_id'] != $r['id']) { ?>

                            <option value="<?php echo $r['id'] ?>"><?php echo $r['name'];
                                                                    echo ' ';
                                                                    echo $r['id']; ?></option>
                        <?php
                          }
                        }
                        ?>

                    </div>
                      </td>
                  <?php
                  }
                  ?>



                

                <td><div>
        <input type="submit" class="btn btn-outline-dark btn-lg px-5 btn-success" class="form-control" name="submit" value=" Update " checked>
      </div></td>






                </tboady>
      </table>

      
  </form>




  </div>
</body>

</html>