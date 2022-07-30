<?php include 'connection_s.php';
session_start();
if (isset($_SESSION['aue'])) {
  header('Location:admin_panel.php');
} else if (isset($_SESSION['iue'])) {
  header('Location:instructor_panel.php');
} else if (isset($_SESSION['sue'])) {
  header('Location:student_panel.php');
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
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-secondary text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <div class="mb-md-5 mt-md-4 pb-5">
                <h2 class="fw-bold mb-2 text-uppercase">Welcome<br>To <br> xyz University </h2>
                <a href="https://localhost/REGISTRATION/login.php">
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                </a>
                <br><br>
                <a href="https://localhost/REGISTRATION/registration.php">
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>