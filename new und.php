<div class="container"  class="row g-3">
  <h2>Student project</h2>
  <table class="table table-striped">
      <thead>
      <th>id</th>
          <th>Project</th>
          
         
          <th>description</th>
          

          <th>status</th>
          <th>action</th>
          

      </thead>
      <tbody>
      <?php
       while($row=mysqli_fetch_array($q)){ ?>
        <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['idea'] ?></td>
        <td><?php echo $row['description'] ?></td>
        
        <td><?php echo $row['status'] ?>
        <td>
          <a href="instructor_project_check.php?eid=<?php echo $row['id'] ?>">edit</a>

 
  
   
</td>
        
  
 
   

 </tr>
      <?php } ?>
      
      $args = array(  'eid' => $r['id']);
       header('Location:instructor_info.php'. http_build_query($args));
       echo 'successfully Inserted';}
      

</tboady>
</table>


student parse_ini_file
<?php 
      include 'connection_s.php'; 
      include 'loggedd_in_st.php'; 
?>
<?php
  if(isset($_POST['logout'])) {
      session_start() ;
      unset($_SESSION["userna"]);
      unset($_SESSION["userema"]);
      session_unset();
      header("Location:student_login.php");}
?>
<?php
    $id= $_GET['eid']; 
    $strd="SELECT * FROM student Where id='$id'";
    $q=mysqli_query($conn,$strd);
    $r=mysqli_fetch_array($q);

    if(ISSET($_POST['submit'])){
      $idea = $_POST['idea'];
      $des=$_POST['des'];
    
    
      if(Isset($_POST['status']))
      {   $status =1;   }
      else
      {   $status=0;    }

      $str="INSERT INTO project(id,idea,description,status)
      VALUES ('$id','$idea','$des','pending')";
    
      if(mysqli_query($conn,$str)){
      echo 'successfully Inserted';}
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



<div class="container"  class="row g-3">
<form method="POST" action="">
<div class="form-group">
    <input type="submit" class="btn btn-success" name="logout" value="logout" checked>
  </div> 
  <div class="form-group">
</div>
</form>
</div>

<div class="container"  class="row g-3">
  <h2>project</h2>

<form method="POST" action="">

  <div class="form-group" >
    <label for="idea">Project idea</label>
    <input required="required" type="idea" class="form-control" name="idea" placeholder="Project Idea">
  </div>

  <div class="form-group" >
    <label for="des">Description</label>
    <input required="required" type="text" class="form-control" name="des" placeholder="description">
  </div>

  <div class="form-group">
    
    <input type="submit" class="btn btn-success" name="submit" value="Save" checked>
  </div>
  

</form> 
<a class="nav-link" href="https://localhost/REGISTRATION/stuproject.php"><input type="submit" class="btn btn-success" name="submit" value="check status of ur project" checked><a>
</div>
<div class="container"  class="row g-3">
  <h2>myself</h2>
  <table class="table table-striped">
      <thead>
          <th>Name</th>
          <th>Id</th>
          <th>Department</th>
          <th>Email</th>
         

      </thead>
      <tbody>
      
      
        <tr>
        <td> <?php echo $r['name']; ?></td>
        <td><?php  echo $r['id']; ?></td>
        <td><?php  echo $r['department']; ?></td>
        <td><?php  echo $r['email'];?></td>

        
 </tr>
</div>
       
</body>
</html>


pass value by header
$args = array(  'eid' => $r['id']);

header("Location:student_panel.php?" . http_build_query($args));
?dep=<?php $_SESSION["suS"]=; echo $ro['department'] ?>&amp;sem=<?php echo $ro['semester']?>&amp;cor=<?php echo $ro['sub'] ?>