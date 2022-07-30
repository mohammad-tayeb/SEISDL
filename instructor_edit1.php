<h1> This is edit page </h1>
<?php include 'connection_s.php'; ?>
<?php
$eid=$_REQUEST['eid'];
$s="SELECT * FROM ins_rg WHERE id=$eid ";
$q1=mysqli_query($conn,$s);
$r1=mysqli_fetch_array($q1);
?>

<?php $str="SELECT name from department"; 
      $q=mysqli_query($conn,$str); ?>
<?php

  if(ISSET($_POST['submit'])){
    $fn = $_POST['fName'];
    $id=$_POST['insId'];
    $dep=$_POST['Department'];
    
    $eml=$_POST['email'];
    $pass= $_POST['Password'];
   
  
    
    if(Isset($_POST['status'])){
      $status =1;
    }
    else
    {
      $status=0;
    }
    $str="INSERT INTO instructor(name,id,department,email,password,status)
    VALUES ('$fn''$id','$dep','$eml', '$pass',$status)";
    
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
  <h2>Instractor Edit Informaition</h2>

<form method="POST" action="">
  <div class="form-group" >
  <label for="fName">First name</label>
  <input required="required" type="text" class="form-control" name="fName" value="<?php echo $r1['FirstName'] ?>" placeholder="First name">
</div>
<div class="form-group" >
  <label for="lName">Last name</label>
  <input required="required" type="text" class="form-control" name="lName" value="<?php echo $r1['LastName'] ?>" placeholder="Last name">
</div>


<div class="form-group">
  <label for="">Department</label>
  <select required="required" name="Department" class="form-control" id="">
    <option value="">Select Department</option>
    <?php
    while($row=mysqli_fetch_array($q)){
    if($row['dep']==$r1['dep']){?>
    

<?php}
    else{?>
     <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
     <?php }
    }
    ?>
  
</div>
<div class="form-group">
  <label for="add">Address</label>
  <input required="required" type="text" class="form-control" name="add" placeholder="Address">
</div>

<div class="form-group">
  <label for="phone">Phone Number</label>
  <input required="required" type="tel" class="form-control" name="phone" placeholder="Phone Number" pattern="[0-1]{2}[3-9]{1}[0-9]{8}">
</div>

<div class="form-group">
  <label for="email">Email</label>
  <input required="required" type="email" class="form-control" name="email" placeholder="email">
</div>


<div class="form-check">

 <input type="checkbox" class="form-check-input"  name="status" value="1" checked>
 <label>Active</label>

</div>
</div>
<div >
  <input type="submit" class="btn btn-success" name="submit" value="Save" checked>
</div>

</form> 
</div>
</body>
</html>