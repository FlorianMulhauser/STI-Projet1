

<?php 

session_start();
if(!isset($_SESSION["logged"]) && !$_SESSION["logged"] == true ){
    header("location: /login.php");
    exit;
    
}
if(!$_SESSION["validity"]) {
     header("location: /logout.php");
    exit;
}
/*
// check user still active
$db = new DBHandler();
$sql = "SELECT * FROM user WHERE username = '".$_SESSION['username']."';";
$result = $db->request($sql)->fetch();
if($result['validity']==0) {
    header("location: /logout.php");
    exit;
}
*/
?>
