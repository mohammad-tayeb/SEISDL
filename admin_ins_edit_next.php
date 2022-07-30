<?php include 'is_logged_in.php';
include 'connection_s.php';
$eid = $_REQUEST['eid'];

$str = "SELECT name from department";
$k = mysqli_query($conn, $str);


$strd = "SELECT * FROM instructor Where id='$eid' ";
$q = mysqli_query($conn, $strd);
$r = mysqli_fetch_array($q);
$dep_sel = $r['department'];

if (isset($_POST['logout'])) {

  session_start();
  unset($_SESSION["aue"]);
  unset($_SESSION["aun"]);
  session_unset();
  header("Location:admin_login.php");
}


if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $id = $_POST['id'];
  $dep = $_POST['department'];

  $gender = $_POST['gender'];
  $bod = $_POST['birthday'];
  $phn = $_POST['phone'];
  $add = $_POST['address'];
  $email = $_POST['email'];


  $st12 = "SELECT * FROM instructor Where id='$id' and email='$email' and phone='$phn'";
  $r1 = mysqli_query($conn, $st12);
  $rowcount = mysqli_num_rows($r1);

  if ($rowcount == 0 || ($email == $r['email'] && $id == $r['id'] && $phn == $r['phone'])) {
    $strq = "UPDATE instructor SET name='$name',id='$id',department='$dep',email='$email',gender='$gender',birthday='$bod',address='$add',phone='$phn' Where id='$eid'  ";
    if (mysqli_query($conn, $strq)) {
      echo 'successfully updatted';
      header('Location:admin_instructor_edit.php');
    }
  } else {
    echo 'New Email or Phone alreday used in a account';
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
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/admin_instructor_edit.php">Instructor Info</a>
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
    <h3 style="text-align:center;"></h3>
    <form method="POST" action="">
      <table style="text-align:center;" class="table table-success table-striped" class="table table-striped">
        <thead>
          <th>#</th>
          <th>Information</th>
        </thead>
        <tbody>


          <tr>
            <td> Name </td>
            <td><input style="text-align:center; background-color: #a9c2bc" required="required" type="text" class="form-control" name="name" value="<?php echo $r['name']; ?>"> </td>
          </tr>
          <tr>
            <td> ID </td>
            <td> <input style="text-align:center; background-color: #b8d6cf" required="required" type="text" class="form-control" name="id" value="<?php echo $r['id']; ?>"></td>
          </tr>
          <tr>
            <td> Email </td>
            <td> <input style="text-align:center; background-color: #a9c2bc" required="required" type="text" class="form-control" name="email" value="<?php echo $r['email']; ?>"></td>
          </tr>
          <tr>
            <td> Department </td>
            <td>
              <div><select style="text-align:center; background-color: #b8d6cf" required="required" name="department" class="form-control" id="">
                  <option style="text-align:center; background-color: #b8d6cf" value="<?php echo $r['department']; ?>"><?php echo $r['department']; ?></option>
                  <?php
                  while ($row = mysqli_fetch_array($k)) {
                    if ($r['department'] != $row['name']) { ?>

                      <option style="text-align:center; background-color: #b8d6cf" value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                  <?php
                    }
                  }
                  ?></div>
            </td>
          </tr>
          <tr>
            <td> Gender </td>
            <td>
              <div>
                <?php
                if ($r['gender'] == 'gender') { ?>
                  <div class="form-group">

                    <select style="text-align:center; background-color: #b8d6cf" required="required" name="gender" class="form-control" id="gender">
                      <option style="text-align:center; background-color: #b8d6cf" value="">Select a Gender </option>
                      <option style="text-align:center; background-color: #b8d6cf" value="male">Male</option>
                      <option style="text-align:center; background-color: #b8d6cf" value="female">Female</option>

                  </div> <?php
                        } else { ?>
                  <div class="form-group">

                    <input disabled style="text-align:center; background-color: #b8d6cf" required="required" type="text" class="form-control" name="gende" value="<?php echo $r['gender']; ?>">
                    <input hidden style="text-align:center; background-color: #b8d6cf" required="required" type="text" class="form-control" name="gender" value="<?php echo $r['gender']; ?>">

                  </div> <?php
                        }
                          ?>
              </div>
          </tr>
          <tr>
            <td> Birthday </td>
            <td><input style="text-align:center; background-color: #a9c2bc" required="required" type="date" class="form-control" name="birthday" value="<?php echo $r['birthday']; ?>"></td>
          </tr>
          <tr>
            <td> Phone </td>
            <td><input style="text-align:center; background-color: #b8d6cf" required="required" type="text" class="form-control" name="phone" value="<?php echo $r['phone']; ?>"> </td>
          </tr>
          <tr>
            <td> Address </td>
            <td><input style="text-align:center; background-color: #a9c2bc" required="required" type="text" class="form-control" name="address" value="<?php echo $r['address']; ?>"> </td>
          </tr>
        </tbody>



      </table>

      <p style="text-align:center;">
        <button class="btn btn-outline-dark btn-lg px-5" type="submit" name="save" value="save">Save</button>
      </p>
    </form>


  </div>
</body>

</html>