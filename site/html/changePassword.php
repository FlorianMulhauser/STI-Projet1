<?php include("fragments/loginFilter.php");

include("fragments/DBHandler.php");
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

    if(empty($confirmation_password_err) && empty($new_password_err)){
        $sql = "UPDATE user SET password = :password WHERE id = :id";

        $id = $_SESSION["id"];

        if($stmt = $db->prepare($sql)){

            $stmt->bindParam(":password", $new_password, SQLITE3_TEXT);
            $stmt->bindParam(":id", $id , SQLITE3_INTEGER);

            if($stmt->execute()){
                $alert = "Password changed !";
                header("location: logout.php");
                exit;
            } else {
                $alert = "An error occured.";
            }
        }
    }
}

?>

<?php include 'fragments/header.php';?>

<body>
    <div> <?php if(isset($alert)) {echo $alert;} ?></div>
    <form method="post" action="" role="form">
<!--        <div class="form-group">-->
<!--            <label for="currentPass">Current Password: </label>-->
<!--            <input id="currentPass" class="form-control" type="text" placeholder="CURRENT PASSWORD">-->
<!--        </div>-->

        <div class="form-group">
            <label for="new_password">New Password: </label>
            <input id="new_password" class="form-control" type="text" placeholder="NEW PASSWORD">
        </div>

        <div class="form-group">
            <label for="confirmation_password">Confirm Password: </label>
            <input id="confirmation_password" class="form-control" type="text" placeholder="CONFIRM PASSWORD">
        </div>

        <button class="btn btn-default" type="submit">Change password</button>

    </form>

</body>

<?php include 'fragments/footer.php';?>


