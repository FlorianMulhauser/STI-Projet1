<?php 
include("../fragments/DBHandler.php");
session_start();
$receiver = $title = $content = $sender = "";
if(isset($_GET['receiver'])) {
$receiver=trim($_GET['receiver']);
}
// todo add login verif
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $sender = $_SESSION['username'];
    // Check if username is empty
    if(empty(trim($_POST["receiver"]))){

    } else {
    	$receiver = trim($_POST["receiver"]);
    }

    if(empty(trim($_POST["content"]))){

    } else {
    	$content = trim($_POST["content"]);
    }

    if(empty(trim($_POST["title"]))){

    } else {
    	$title = trim($_POST["title"]);
    }

   	if(!empty($receiver) && !empty($title) && !empty($content)) {
   		$db = new DBHandler();
    	$db->exec("INSERT INTO messages (title, message,sender,receiver) 
                VALUES ('".$title."','".$content."','".$sender."','".$receiver."')");
   	}
   }
?>

<?php include("../fragments/header.php"); ?>

<div class="container">
	<form method="post"  role="form">
		<input name="receiver" value= <?php echo "'".$receiver."'" ?> placeholder="receiver" type="text">
		<input name="title" placeholder="title" type="text">
		<input name="content" placeholder="content" type="text">
		<button type="submit" value="submit"> submit </button>
	</form>

</div>

<?php include("../fragments/footer.php"); ?>