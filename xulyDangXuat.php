<?php
session_start();

if (isset($_SESSION["username"])) {
    // Unset the session variable
    unset($_SESSION["username"]);
}

session_destroy();



header("location: Trangchu.php");
?>