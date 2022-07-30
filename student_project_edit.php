<?php
include 'loggedd_in_st.php';
include 'connection_s.php';

$dd = $_SESSION["suD"];
$id = $_SESSION["suid"];
$ss = $_REQUEST["pro"];

$str = "SELECT * from project where semester='$ss' and id='$id' and department='$dd'";
$l = mysqli_query($conn, $str);
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
                $row = mysqli_fetch_array($l); ?>
                <tr>
                    <td><?php echo $row['idea'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['Remark'] ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="file" class="form-control" id="" value="<?php echo $row['submit'] ?>">
                        </form>
                    </td>


                </tr>





                </tboady>
        </table>
        <p style="text-align:center;">

            <button class="btn btn-outline-dark btn-lg px-5" type="submit">Edit</button>
        </p>



    </div>


</body>

</html>