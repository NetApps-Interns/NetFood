<?php
// Start the session
session_start();

//if the user is already logged in then redirect user to welcome page
if (isset($_SESSION["userid"]) && $_SESSION["user"] === true) {
    header("location: menu.php");
    exit;
}