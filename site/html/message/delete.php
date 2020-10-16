<?php include("../filters/loginFilter.php"); ?>
<?php 
include("../handlers/DBHandler.php");
$message_content = $message_sender =$message_time =  "";


if(isset($_GET['id'])) {
	$id = $_GET['id']; 
	$db = new DBHandler();
	// verify the id concern the user 



	// get message detail
	
    $result = $db->request("SELECT * FROM messages WHERE id = '".$id."';");
    
    $message = $result->fetch();
    $message_sender = $message['sender'];
    $message_content =  $message['message'];
    $message_time = $message['time'];

    $result = $db->exec("DELETE FROM messages WHERE id = '".$id."';");
    
    header("location: ../inbox.php");
}	
?>
