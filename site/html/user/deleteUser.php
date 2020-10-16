<?php include("../fragments/adminFilter.php");


include("../fragments/DBHandler.php");

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
<h3> Delete a user here</h3>
<div class="container">

    <form action="deleteUser.php?uid=<?php echo uniqid()?>" role="form" method="post">
        <div class="form-group">
            <h4>Search the user to delete by giving the username</h4>
            <label for="TFusername">Username: </label>
<!--            --><?php // echo $username ?>
            <input id="TFusername" name="TFusername" class="form-control" type="text" placeholder="USERNAME">
        </div>

        <button class="btn btn-danger" type="submit">Delete the user</button>

    </form>

</div>
</body>
<?php include '../fragments/footer.php';?>

