<?php
include 'loggedd_in_st.php';
include 'connection_s.php';
$id = $_SESSION["suid"];

$str1 = "SELECT * from student where id='$id'";
$l1 = mysqli_query($conn, $str1);
$r = mysqli_fetch_array($l1);
$dd = $r["department"];
$ss = $r["semester"];
$su = $_REQUEST["pro"];

$strd = "SELECT * FROM project where id='$id' and department='$dd' and semester='$ss' and course='$su'";
$q = mysqli_query($conn, $strd);
$r1 = mysqli_fetch_array($q);
$rowcount = mysqli_num_rows($q);


if (isset($_POST['submit'])) {
    $idea = $_POST['idea'];
    $des = $_POST['description'];

    $str = "INSERT INTO project(id,semester,department,course,idea,description) values('$id','$ss','$dd','$su','$idea','$des')";

    if (mysqli_query($conn, $str)) {
       
        echo 'successfully Inserted';

        header('Location:student_CLASS.php?');
    } else {
        echo 'id or email alreday used';
    }
}
if (isset($_POST['logout'])) {
    session_start();
    unset($_SESSION["sue"]);
    unset($_SESSION["suid"]);
    session_unset();
    header("Location:student_login.php");
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
                    <a style="color:blue;" class="nav-link" href="https://localhost/REGISTRATION/student_CLASS.php">CLASS</a>
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





        <?php
        if ($rowcount == 0) { ?>
            <h2>Project </h2>
            <form method="POST" action="">

                <div class="form-group">
                    <input required="required" type="text" class="form-control" name="idea" placeholder="Project Idea">
                </div>

                <div class="form-group">
                    <input required="required" type="text" class="form-control" name="description" placeholder="Description">
                </div>

                <div>

                    <input type="submit" class="btn btn-lg px-5 btn-success" class="form-control" name="submit" value=" Submit " checked>
                </div>
            </form>
        <?php } else { ?>

            <div class="container" class="row g-3">
                <h2>Project status</h2>
                <table style="text-align:center;" class="table table-striped">
                    <thead>
                        <th>Project</th>


                        <th>description</th>


                        <th>status</th>
                        <th>Remark</th>
                        <th>Submit</th>


                    </thead>
                    <tbody>
                        <?php
                        ?>
                        <tr>
                            <td><?php echo $r1['idea'] ?></td>
                            <td><?php echo $r1['description'] ?></td>
                            <td><?php echo $r1['status'] ?></td>
                            <td><?php echo $r1['Remark'] ?></td>
                            <td>
                                <form method="POST" action="">
                                    <?php
                                    if ($r1['status'] == 'rejected' || $r1['status'] == 'pending') { ?>

                                        <input disabled type="file" class="form-control" id="" value="<?php echo $r1['submit'] ?>">


                                    <?php } else { ?>
                                        <input type="file" class="form-control" id="" value="<?php echo $r1['submit'] ?>"><?php } ?>
                                </form>
                            </td>


                        </tr>





                        </tboady>
                </table>
               


            </div>
        <?php } ?>
    </div>
</body>

</html>