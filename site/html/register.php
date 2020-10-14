<?php include("fragments/DBHandler.php");

$db = new DBHandler();

$sql = "INSERT INTO USER (USERNAME, PASSWORD, VALIDITY, ROLE)"
    ."\n"."VALUES ('".$_POST["TFusername"].
    "', '".$_POST["TFpassword"].
    "', '".$_POST["TFvalidityT"].
    "', '".$_POST["TFrole"]."');";

//$ret = $DB.request($sql);
$db->exec($sql);


?>

<?php //include 'fragments/header.php';?>

<body>
    <h3> Register a person here</h3>
    <div class="container">

        <form action="register.php?uid=<?php echo uniqid()?>" role="form" method="post">
            <div class="form-group">
                <label for="TFusername">Username: </label>
                <input id="TFusername" class="form-control" type="text" placeholder="USERNAME">
            </div>

            <div class="form-group">
                <label for="TFpassword">Password: </label>
                <input id="TFpassword" class="form-control" type="text" placeholder="PASSWORD">
            </div>


            <div class="form-group">Choose the activity:
                <input type="radio" name="TFvalidity"
                    <?php if (isset($validity) && $validity=="true") echo "checked";?>
                       value="true">Active
                <input type="radio" name="TFvalidity"
                    <?php if (isset($validity) && $validity=="false") echo "checked";?>
                       value="false">Inactive
            </div>

            <div class="form-group">Choose the role:
                <input type="radio" name="TFrole"
                    <?php if (isset($role) && $role=="collaborateur") echo "checked";?>
                       value="collaborateur">Collaborateur
                <input type="radio" name="TFrole"
                    <?php if (isset($role) && $role=="administrateur") echo "checked";?>
                       value="administrateur">Administrateur
            </div>

            <button class="btn btn-default" type="submit">Register the user</button>

        </form>
    </div>
</body>
<?php //include 'fragments/footer.php';?>

