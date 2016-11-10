<?php
    session_start();
    header("Location: janitor-login.php");
    unset($_SESSION); 
    unset($_SESSION['admin']);
    unset($_SESSION["logged_in"]);
?>