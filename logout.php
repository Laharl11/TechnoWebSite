<?php
    session_start();
    if (isset($_SESSION['id'])){
        session_unset();
        header("location: homepage.html");
    }
    else if (isset($_SESSION['adminID'])){
        session_unset();
        header("location: loginAdminPage.php");
    }
?>