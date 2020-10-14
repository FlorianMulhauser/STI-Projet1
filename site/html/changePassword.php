<?php
session_start();
$id = $_SESSION["id"]; // id of the current connected user

//need to start/connect DB with DBHandler
$DB = new DBHandler();

$sql = 'SELECT * from USER where ID="'.$id.'";';

//$ret = $DB.request($sql);
$ret = $DB->query($sql);

while($entry = $ret->fetchArray(SQLITE3_ASSOC)){
    if($_POST["currentPass"] == $entry["PASSWORD"] && $_POST["newPass"] == $entry["confirmPass"]){
        // need to do a proper query
        $DB->query("UPDATE USER set PASSWORD='".$_POST["newPass"]."' WHERE ID='".$id."'");
        $alert = "Password Changed !";
    } else {
        $alert =  "Something is wrong, no change saved.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change your password here</title>
    <meta name="viewport" charset="utf-8" content="width=device-width">
</head>

<body>
    <div> <?php if(isset($alert)) {echo $alert;} ?></div>
    <form method="post" action="" role="form">
        <div class="form-group">
            <label for="currentPass">Current Password: </label>
            <input id="currentPass" class="form-control" type="text" placeholder="CURRENT PASSWORD">
        </div>

        <div class="form-group">
            <label for="newPass">New Password: </label>
            <input id="newPass" class="form-control" type="text" placeholder="NEW PASSWORD">
        </div>

        <div class="form-group">
            <label for="confirmPass">Confirm Password: </label>
            <input id="confirmPass" class="form-control" type="text" placeholder="CONFIRM PASSWORD">
        </div>

        <button class="btn btn-default" type="submit">Change password</button>

    </form>

</body>
</html>


