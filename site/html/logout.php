<?php
session_start();

// removes ession variables
$_SESSION = array();
session_destroy();

// send to login
header("location: login.php");
exit;

?>