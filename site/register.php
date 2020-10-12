<?php
session_start();

// get DB handler construct

$DB = new DBHandler();

$sql = "INSERT INTO USER (ID, USERNAME, PASSWORD, VALIDITY, ROLE)"
    ."\n"."VALUES ('".$_GET["uid"].
    "', '".$_POST["TFusername"].
    "', '".$_POST["TFpassword"].
    "', '".$_POST["TFvalidityT"].
    "', '".$_POST["TFrole"]."');";

//$ret = $DB.request($sql);
$ret = $DB->exec($sql);

// gere erreur de db

// close db

?>
<!DOCTYPE html>
<html>
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
