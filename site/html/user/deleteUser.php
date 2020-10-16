<?php include("../filters/adminFilter.php");


include("../handlers/DBHandler.php");

include '../fragments/header.php';

$username = "";
$username_err = "";

$db = new DBHandler();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["TFusername"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["TFusername"]);
    }

    if(!empty($username)){
        if(empty($username_err)){
            $sql = "DELETE FROM user WHERE username = '".$username."';";

            $db->exec($sql);
            echo "Deleted !";
            exit;
        }
        echo "an error ocurred";
    }

}

?>
<body>
<div class="container">
    <div class="card purple lighten-5">
    <div class="card-content">
    <span class="card-title">Search the user to delete by giving the username</span>
    <form action="deleteUser.php?uid=<?php echo uniqid()?>" role="form" method="post">
        <div class="form-group">
            
            <label for="TFusername">Username: </label>
<!--            --><?php // echo $username ?>
            <input id="TFusername" name="TFusername" class="form-control" type="text" placeholder="USERNAME">
        </div>
        <div class="card-action">
        <button class="btn btn-danger" type="submit">Delete the user</button>
        </div>
    </form>

</div>
</div>
</div>
</body>
<?php include '../fragments/footer.php';?>

