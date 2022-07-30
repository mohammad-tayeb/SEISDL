<?php
session_start();
if(!isset($_SESSION['iue']) && ($_SESSION['type']!==1)&& ($_SESSION['type']!==3)){
    session_destroy() ;
    unset($_SESSION["iue"]);
    unset($_SESSION["id"]);
    header('Location:instructor_login.php');
}
