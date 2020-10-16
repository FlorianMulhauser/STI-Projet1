<?php include("../filters/loginFilter.php");

include("../handlers/DBHandler.php");
$db = new DBHandler();
$new_password = $confirmation_password = "";
$new_password_err = $confirmation_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if new_password is empty
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Enter a new password.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Assert confirm password
    if(empty(trim($_POST["confirmation_password"]))){
        $confirmation_password_err = "Confirm your password.";
    } else{
        $confirmation_password = trim($_POST["confirmation_password"]);
        if(empty($new_password_err) && ($new_password != $confirmation_password)){
            $confirmation_password_err = "ERROR: Password did not match.";
        }
    }

    $id = $_SESSION["id"];

    if(empty($confirmation_password_err) && empty($new_password_err)){
        $sql = "UPDATE user SET password = '".$new_password."' WHERE id = '".$id."'";

        $db->exec($sql);
        $alert = "Password changed !";

    } else {
        $alert = "An error occured.";
    }
}

?>

<?php include '../fragments/header.php';?>

<body>
<div class="container">
    <div class="card purple lighten-5">
    <div class="card-content">
    <span class="card-title"> Change your password here : </span>
    <div > <?php if(isset($alert)) {echo $alert;} ?></div>
    
    <form method="post" action="" role="form">
    
        <div class="form-group">
            <label for="new_password">New Password: </label>
            <input id="new_password" name="new_password" class="form-control" type="password" placeholder="NEW PASSWORD">
        </div>

        <div class="form-group">
            <label for="confirmation_password">Confirm Password: </label>
            <input id="confirmation_password" name="confirmation_password" class="form-control" type="password" placeholder="CONFIRM PASSWORD">
        </div>
        <div class="card-action">
        <button class="btn btn-default" type="submit">Change password</button>
        </div>

    </form
    </div>
    </div>
</div>
</body>

<?php include '../fragments/footer.php';?>


