<?php
session_start();
$id = $_SESSION["id"]; // id of the current connected user

// Set default timezone
date_default_timezone_set('UTC');

try {
/**************************************
 * Create databases and                *
 * open connections                    *
 **************************************/

// Create (connect to) SQLite database in file
$db = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
// Set errormode to exceptions
$db->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * from USER where ID="'.$id.'";';

//$ret = $DB.request($sql);
$ret = $db->query($sql);

foreach($ret as $entry){
    if($_POST["currentPass"] == $entry["PASSWORD"] && $_POST["newPass"] == $entry["confirmPass"]){
        // need to do a proper query
        $db->exec("UPDATE USER set PASSWORD='".$_POST["newPass"]."' WHERE ID='".$id."'");
        $alert = "Password Changed !";
    } else {
        $alert =  "Something is wrong, no change saved.";
    }
}

    /**************************************
     * Close db connections                *
     **************************************/

    // Close file db connection
    $file_db = null;
}
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
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


