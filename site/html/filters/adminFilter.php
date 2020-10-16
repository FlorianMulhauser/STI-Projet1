<?php 
session_start();
if($_SESSION["role"] != "administrateur") {
    header("location: /inbox.php");
    exit;

}

?>
