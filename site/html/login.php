<?php
session_start();
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

$sql = 'SELECT * from USER where USERNAME="'.$_POST["TFusername"].'";';

//$ret = $DB.request($sql);
$ret = $db->query($sql);

foreach($ret as $entry){

    $id = $entry['ID'];
    $pass = $entry['PASSWORD'];
    $username = $entry['USERNAME'];

}
 if($id=""){

     echo "This user doesn't exist, please register him first.\n";
 } else {

     if($pass !== $_POST["TFpassword"]){

         echo "The password is invalid for this user.\n";
     } else if( $pass !== ""){

         $_SESSION["login"] = $username;
         echo "Login successfull !\n";
     }
 }

    /**************************************
     * Close db connections                *
     **************************************/

    // Close file db connection
    $db = null;
}
catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log IN page</title>
        <meta name="viewport" charset="utf-8" content="width=device-width">
    </head>

    <body>
    <div>
        <form action="login.php?login=true" role="form">
            <div class="form-group">
                <label for="TFusername">Username: </label>
                <input id="TFusername" class="form-control" type="text" placeholder="USERNAME">
            </div>

            <div class="form-group">
                <label for="TFpassword">Password: </label>
                <input id="TFpassword" class="form-control" type="text" placeholder="PASSWORD">
            </div>

            <button class="btn btn-default" type="submit">Log in</button>

        </form>
    </div>
    </body>
</html>
