<?php
session_start();
if(!isset($_SESSION['sue'])  && ($_SESSION['type']!==1)&& ($_SESSION['type']!==2)){
    session_destroy() ;
  unset($_SESSION["sue"]);
  unset($_SESSION["sun"]);
    header('Location:student_login.php');
    session_unset();

}
