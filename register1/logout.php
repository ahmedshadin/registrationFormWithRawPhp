<?php 
    session_start();
    session_destroy();

    $_SSESSION = array();
    header("location: login.php");
    die();
?>