<?php
include __DIR__.'/../CORE/config/init.php';
header("Content-type: application/json");

$_SESSION = [];
// session_destroy();
die(output_json(['Logout Successful', 'See you soon!'], 1, [], 0));