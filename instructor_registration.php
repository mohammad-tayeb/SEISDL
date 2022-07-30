<?php include 'connection_s.php';
$str = "SELECT name from department";
$q = mysqli_query($conn, $str);
if (isset($_SESSION['aue']) || isset($_SESSION['iue']) || isset($_SESSION['sue'])) {
  header('Location:admin_panel.php');
} ?>
<?php

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $dep = $_POST['department'];
  $eml = $_POST['email'];
  $pass = $_POST['password'];
  $id = $_POST['id'];
  $gender = $_POST['gender'];
  $bod = $_POST['birthday'];

  if (isset($_POST['status'])) {
    $status = 1;
  } else {
    $status = 0;
  }
  $strd = "SELECT * FROM instructor Where email='$eml' AND id='$id'";
  $q = mysqli_query($conn, $strd);
  $rowcount = mysqli_num_rows($q);
  $r = mysqli_fetch_array($q);
  if ($rowcount == 0) {
    $str = "INSERT INTO instructor(name,department,email ,password,status,id,gender,birthday)
      VALUES ('$name','$dep','$eml', '$pass',$status,'$id','$gender','$bod')";
    if (mysqli_query($conn, $str)) {
      header('Location:instructor_login.php');
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
    <h3>Instractor registration</h3>

    <form method="POST" action="">
      <div class="form-group">
        <div class="form-group">

          <input required="required" type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">

          <input required="required" type="text" class="form-control" name="id" placeholder="Id">
        </div>

        <div class="form-group">

          <select required="required" name="gender" class="form-control" id="gender">
            <option value="">Select a Gender </option>
            <option value="male">Male</option>
            <option value="female">Female</option>

        </div>
        <div class="form-group">
          <input type="date" id="birthday" class="form-control" name="birthday">
        </div>



        <div class="form-group">
          <select required="required" name="department" class="form-control" id="">
            <option value="">Select a Department</option>
            <?php
            while ($row = mysqli_fetch_array($q)) { ?>

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
          <input type="submit" class="btn btn-lg px-5 btn-success" class="form-control" name="submit" value="Submit" checked>
        </div>
      </div>
    </form>

    <div class="row mt-3">
      <a href="https://localhost/REGISTRATION/registration.php">
        <button class="btn btn-outline-dark btn-lg px-1">Main Registration</button> </a>
    </div>
  </div>

</body>

</html>