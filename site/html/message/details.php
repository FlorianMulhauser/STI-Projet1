<?php include("../filters/loginFilter.php"); ?>
<?php include("../fragments/header.php"); ?>
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
}
?>
<div class="container">
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Content:
		</div>
		<?php  echo $message_content ?>
		<div class="card-action"> 
			 <span style="float:right;"><?php echo $message_time ?></span>
		From: <?php echo $message_sender?> 
		</div>
	</div>
</div>
</div>
<?php include("../fragments/footer.php"); ?>