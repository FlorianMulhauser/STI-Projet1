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

$sql = "INSERT INTO USER (USERNAME, PASSWORD, VALIDITY, ROLE)"
    ."\n"."VALUES ('".$_POST["TFusername"].
    "', '".$_POST["TFpassword"].
    "', '".$_POST["TFvalidityT"].
    "', '".$_POST["TFrole"]."');";

//$ret = $DB.request($sql);
$ret = $db->exec($sql);

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
    <title>Registeration page</title>
    <meta name="viewport" charset="utf-8" content="width=device-width">
</head>

<body>
    <h3> Register a person here</h3>
    <form action="register.php?uid=<?php echo uniqid()?>" role="form" method="post">
        <div class="form-group">
            <label for="TFusername">Username: </label>
            <input id="TFusername" class="form-control" type="text" placeholder="USERNAME">
        </div>

        <div class="form-group">
            <label for="TFpassword">Password: </label>
            <input id="TFpassword" class="form-control" type="text" placeholder="PASSWORD">
        </div>

        <div class="form-group">

            <label for="TFvalidity">Choose the validity state:</label>
            <select id="TFvalidity">
                <option value="true">Active account</option>
                <option value="false">Innactive account</option>
            </select>
        </div>

        <div class="form-group">
            <label for="TFrole">Choose the role:</label>
            <select id="TFrole">
                <option value="collaborateur">Collaborateur</option>
                <option value="administrateur">Administrateur</option>
            </select>
        </div>

        <button class="btn btn-default" type="submit">Register the user</button>

    </form>
</body>
</html>
