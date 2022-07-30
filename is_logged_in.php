<?php
session_start();
if(!isset($_SESSION['aue']) && ($_SESSION['type']!==2) && ($_SESSION['type']!==3)){
    session_destroy() ;
    unset($_SESSION["aue"]);
    unset($_SESSION["aun"]);
    header('Location:admin_login.php');

}
