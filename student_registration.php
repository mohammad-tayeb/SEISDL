<?php include 'connection_s.php';
if (isset($_SESSION['aue']) || isset($_SESSION['iue']) || isset($_SESSION['sue'])) {
  header('Location:admin_panel.php');
} ?>
<?php $str = "SELECT name from department";
$k = mysqli_query($conn, $str); ?>
<?php

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $dep = $_POST['department'];
  $eml = $_POST['email'];
  $pass = $_POST['password'];
  $id = $_POST['id'];
  $gender = $_POST['gender'];
  $bod = $_POST['birthday'];
  $batch = $_POST['batch'];
  $semester = $_POST['semester'];

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
    $str = "INSERT INTO student(name,department,email ,password,status,id,gender,birthday,batch,semester)
    VALUES ('$name','$dep','$eml','$pass',$status,'$id','$gender','$bod','$batch','$semester')";

    if (mysqli_query($conn, $str)) {
      header('Location:student_login.php');
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
  <div class="container" class="row g-3">
    <h2>Student registration</h2>

    <form method="POST" action="">
      <div class="form-group">
        <input required="required" type="text" class="form-control" name="name" placeholder="Name">
      </div>
      <div class="form-group">
        <input required="required" type="text" class="form-control" name="id" placeholder="Id">
      </div>
      <div class="form-group">
        <input type="date" id="birthday" class="form-control" name="birthday">
      </div>
      <div class="form-group">
        <select required="required" name="gender" class="form-control" id="gender">
          <option value="">Select a Gender </option>
          <option value="male">Male</option>
          <option value="female">Female</option>
      </div>
      <div class="form-group">
        <input required="required" type="text" class="form-control" name="batch" placeholder="Batch">
      </div>
      <div class="form-group">
        <input required="required" type="text" class="form-control" name="semester" placeholder="Semester">
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
      <div class="form-group">
        <input required="required" type="email" class="form-control" name="email" placeholder="Email">
      </div>
      <div class="form-group">
        <input required="required" type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="form-check">
        <input type="checkbox" class="form-check-input" class="form-control" name="status" value="1" checked>
        <label>Active</label>
      </div>
      <div>
        <input type="submit" class="btn btn-lg px-5 btn-success" class="form-control" name="submit" value=" Submit " checked>
      </div>
    </form>
    <div class="row mt-3"></div>
    <a href="https://localhost/REGISTRATION/registration.php">
      <button class="btn btn-outline-dark btn-lg px-2" type="submit">Main Registration</button>
    </a>
  </div>
</body>

</html>