<?php
session_start();
//need to start/connect DB with DBHandler
$DB = new DBHandler();

$sql = 'SELECT * from USER where USERNAME="'.$_POST["TFusername"].'";';

//$ret = $DB.request($sql);
$ret = $DB->query($sql);

while($entry = $ret->fetchArray(SQLITE3_ASSOC)){

    $id = $entry['ID'];
    $pass = $entry['PASSWORD'];
    $username = $entry['USERNAME'];

}
 if($id=""){

     echo "This user doesn't exist, please register him first.\n";
 } else {

     if($pass !== $_POST["TFpassword"]){

         echo "The password is invalid for this user.\n";
     } else {

         $_SESSION["login"] = $username;
         echo "Login successfull !\n";
     }
 }

 // close the DB ?

?>
<!DOCTYPE html>
<html>
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
