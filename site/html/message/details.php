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
    $message_title = $message['title'];
    $message_content =  $message['message'];
    $message_time = $message['time'];
}
?>
<div class="container">
<div class="card">
	<div class="card-content">
		<div class="card-title">
		 title : <b><?php echo $message_title?></b>  </br>
			
		</div>
		content: <?php  echo $message_content ?>
		<div class="card-action"> 
			 <span style="float:right;"><?php echo $message_time ?></span>
		From: <b> <?php echo $message_sender?> </b>
		<?php 
		  echo '<a class="btn-floating btn-small waves-effect waves-light green" type="submit" href="/message/create.php?reply&id='.$_GET['id'].'&receiver='.$_GET['sender'].'&title='.$_GET['title'].'"><i class="material-icons">reply</i></a>';

                    // delete
                    echo '<a href="/message/delete.php?id='.$_GET['id'].'" class="btn-floating btn-small waves-effect waves-light red" type="submit" ><i class="material-icons">delete_forever</i></a>';
		?>
		</div>
	</div>
</div>
</div>
<?php include("../fragments/footer.php"); ?>
