<?php include 'logged_in_ins.php';
include 'connection_s.php';

if (isset($_POST['logout'])) {

  session_start();
  unset($_SESSION["iue"]);
  unset($_SESSION["iun"]);
  session_unset();
  header("Location:instructor_login.php");
}


$strd11 = "SELECT * FROM instructor";
$ke = mysqli_query($conn, $strd11);


$se = $_SESSION["iue"];
$strd = "SELECT * FROM instructor Where email='$se'";
$q = mysqli_query($conn, $strd);
$r = mysqli_fetch_array($q);
$eid = $_REQUEST['id'];
$dep = $_REQUEST['dep'];
$semm = $_REQUEST['sem'];
$corr = $_REQUEST['cor'];



$strd1 = "SELECT * FROM project where department='$dep' and semester='$semm' and course='$corr' and id='$eid'";
$l = mysqli_query($conn, $strd1);
$r1 = mysqli_fetch_array($l);

if (isset($_POST['submit'])) {
  $stdd = $_POST['st'];
  $des = $_POST['description'];
  $idea = $_POST['idea'];
  $rem = $_POST['remark'];
  $str = "UPDATE project SET status='$stdd',description='$des',idea='$idea',Remark='$rem'  where id='$eid' and department='$dep' and semester='$semm' and course='$corr'";
  if (mysqli_query($conn, $str)) {
    header('Location:instructor_project_list_2.php');
    echo 'successfully Inserted';
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
    <a class="navbar-brand" href="https://localhost/REGISTRATION/instructor_panel.php">I am '<?php echo $r['name'] ?>'</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="https://localhost/REGISTRATION/instructor_info.php">My Info</a>
        </li>

        <li class="nav-item">
          <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/instructor_project_list.php">Student Project List</a>
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
    <h3 style="text-align:center;"></h3>


    <form method="POST" action="">
      <div class="form-group">
        <lebel for="id">Id</lebel>
        <input disabled required="required" type="text" class="form-control" name="id" value="<?php echo $r1['id']; ?>">
      </div>
      <div class="form-group">
        <lebel for="idea">Idea</lebel>
        <input required="required" type="text" class="form-control" name="idea" value="<?php echo $r1['idea']; ?>">
      </div>
      <div class="form-group">
        <lebel for="description">Description</lebel>
        <input required="required" type="text" class="form-control" name="description" value="<?php echo $r1['description']; ?>">
      </div>
      <div class="form-group">
        <lebel for="remark">Remark</lebel>
        <input required="required" type="text" class="form-control" name="remark" value="<?php echo $r1['Remark']; ?>">
      </div>

      <div class="form-group">

        <label for="">action</label>
        <select required="required" name="st" class="form-control" id="st">
          <option value="">Select action</option>
          <option value="accepted">Accept</option>
          <option value="rejected">reject</option>
        </select>
      </div>
      <div>
        <input type="submit" class="btn btn-success" name="submit" value="submit" checked>
      </div>


    </form>
    </tboady>
    </table>



  </div>
</body>

</html>