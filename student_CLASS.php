<?php include 'loggedd_in_st.php';
include 'connection_s.php';
$se = $_SESSION["suid"];
$strd = "SELECT * FROM student Where id='$se'";
$q = mysqli_query($conn, $strd);
$r = mysqli_fetch_array($q);

$dddd = $r['department'];
$ssss = $r['semester'];
$strd1 = "SELECT * FROM course where department='$dddd' and semester='$ssss'";
$l = mysqli_query($conn, $strd1);


if (isset($_POST['logout'])) {

  session_start();
  unset($_SESSION["iue"]);
  unset($_SESSION["iuid"]);
  session_unset();
  header("Location:instructor_login.php");
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
  <style>

  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="https://localhost/REGISTRATION/student_panel.php">I am '<?php echo $r['name'] ?>'</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/student_info.php">My Info</a>
        </li>

        <li class="nav-item">
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/student_CLASS.php">Class</a>
        </li>

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
    <h3 style="text-align:center;">My Course</h3>
    <table style="text-align:center;" class="table table-success table-striped" ">
      
    
      <thead>
          <th>Course</th>
          <th>Action</th>
        </thead>
      <tbody>
      <?php
      while ($ro = mysqli_fetch_array($l)) { ?>
      <tr>
      
        <td> <?php echo $ro['sub']; ?></td>
        
        <td> <a href=" https://localhost/REGISTRATION/student_project.php?pro=<?php echo $ro['sub'] ?>"><button class="btn btn-outline-dark btn-lg px-5" type="submit">Go</button></a>
      <td>
        </tr>
      <?php
      }
      ?></tbody>
    </table>
</body>

</html>