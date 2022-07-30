<?php 
include 'logged_in_ins.php'; 
include 'connection_s.php'; 
$se = $_SESSION["iuid"];
$strd="SELECT * FROM instructor Where id='$se'";
 $q=mysqli_query($conn,$strd);
 $r=mysqli_fetch_array($q);
 $strdd="SELECT * FROM course Where ins_id='$se'";
 $ql=mysqli_query($conn,$strdd);

?>
<?php
$str="SELECT * from project "; 
      $q=mysqli_query($conn,$str); ?>
      <?php 

if(isset($_POST['logout'])) {
  
session_start() ;
  unset($_SESSION["iue"]);
  unset($_SESSION["iuid"]);
  session_unset();
header("Location:instructor_login.php");}

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
<body><nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="https://localhost/REGISTRATION/instructor_panel.php">I am '<?php echo $r['name'] ?>'</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/instructor_info.php">My Info</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="https://localhost/REGISTRATION/instructor_project_list.php">Student Project List</a>
      </li>

      <form method="POST" action="">
<div >
    <input type="submit" class="btn btn-success" name="logout" value="logout" checked>
  </div> 
</form>
</li>
      
    </ul>
  </div>
</nav>





<div class="container"  class="row g-3">
    <h3 style="text-align:center;" >This session I am instructing</h3>
<table class="table table-success table-striped" >
      <thead>
        <th>Department</th>
          <th>Semester</th>
          <th>Course</th>
        </thead>
      <tbody>
      <?php
    while($r1=mysqli_fetch_array($ql)){?>
    <tr>
      <td> <?php echo $r1['department']; ?></td>
        <td> <?php echo $r1['semester']; ?></td>
        <td> <?php echo $r1['sub']; ?></td></tr>
        <?php } ?></tbody></table>
        <h3 style="text-align:center;" >My Information</h3>
  <table style="text-align:center;" class="table table-success table-striped" class="table table-striped">
      <thead  >
          <th >#</th>
          <th >Information</th>
          
         

      </thead>
      <tbody>
      
      
        <tr>
        <td> Name </td>
        <td> <?php echo $r['name']; ?></td>
        </tr>
        <tr>
        <td> ID </td>
        <td> <?php echo $r['id']; ?></td>
        </tr><tr>
        <td> Email </td>
        <td> <?php echo $r['email']; ?></td>
        </tr><tr>
        <td> Department </td>
        <td> <?php echo $r['department']; ?></td>
        </tr><tr>
        <td> Password </td>
        <td> <?php echo $r['password']; ?></td>
        </tr><tr>
        <td> Gender </td>
        <td> <?php echo $r['gender']; ?></td>
        </tr><tr>
        <td> Birthday </td>
        <td> <?php echo $r['birthday']; ?></td>
        </tr>
        <br><tr>
        <td> Phone </td>
        <td> <?php echo $r['phone']; ?></td>
        </tr>
        <tr>
        <td> Address </td>
        <td> <?php echo $r['address']; ?></td>`
        
        </tr>
       </tbody>
       
        

       </table>
       <p style="text-align:center;">
       <a href="https://localhost/REGISTRATION/instructor_edit.php">
        <button  class="btn btn-outline-dark btn-lg px-5" type="submit">Edit My Information</button>
                                </a></p>
      
       
</div>
</body>
</html>

