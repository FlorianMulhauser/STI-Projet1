<?php include("../fragments/header.php"); ?>
<?php 
include("../fragments/DBHandler.php");
$message_content = "";


if(isset($_GET['id'])) {
	$id = $_GET['id']; 
	$db = new DBHandler();
	// verify the id concern the user 



	// get message detail
	
    $result = $db->request("SELECT * FROM messages WHERE id = '".$id."';");
    
    $message = $result->fetch();

    $message_content =  $message['message'];
}
?>
<div class="container">
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Content:
		</div>
		<?php  echo $message_content ?>
	</div>
</div>
</div>
<?php include("../fragments/footer.php"); ?>