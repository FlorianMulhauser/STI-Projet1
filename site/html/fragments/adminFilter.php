<?php 
session_start();
if(!isset($_SESSION["logged"]) && !$_SESSION["role"] == "admin"){
    header("location: /inbox.php");
    exit;
    
}
?>
