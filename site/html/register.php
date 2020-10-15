<?php include("fragments/adminFilter.php");

include("fragments/DBHandler.php");

include 'fragments/header.php';

$username = $password = $validity = $role = "";
$username_err = $password_err = $validity_err = $role_err = "";
$inactive_checked = $active_checked = $admin_checked = $collab_checked = "";

$db = new DBHandler();

if($validity == '1') {
    $active_checked = 'checked';
} else {
    $inactive_checked = 'checked';
}


if($role == 'administrateur') {
    $admin_checked = 'checked';
} else {
    $collab_checked = 'checked';
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["TFusername"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["TFusername"]);
    }
    // Check if password is empty
    if(empty(trim($_POST["TFpassword"]))){
        $password_err = "Please enter password.";
    } else{
        $password = trim($_POST["TFpassword"]);
    }
    // Check if validity is empty
    if(empty(trim($_POST["active"]))){
        $validity_err = "Please give the validity.";
    } else{
        $validity = trim($_POST["active"]);
    }
    // Check if role is empty
    if(empty(trim($_POST["role"]))){
        $role_err = "Please enter the role.";
    } else{
        $role = trim($_POST["role"]);
    }


    if(!empty($username) && !empty($password) && !empty($validity) && !empty($role)){
        if(empty($username_err) && empty($validity_err) && empty($password_err) && empty($role_err)){
            $sql = "INSERT INTO user (username, password, validity, role) VALUES ('".$username."', '".$password."', '".$validity."', '".$role."');";

            $db->exec($sql);
            echo "New user registered !";
        } else {
            echo "An error occured.";
        }
    }

}

?>


<body>
    <h3> Register a person here</h3>
    <div class="container">

        <form action="register.php?uid=<?php echo uniqid()?>" role="form" method="post">
            <div class="form-group">
                <label for="TFusername">Username: </label>
                <input id="TFusername" name="TFusername" class="form-control" type="text" placeholder="USERNAME">
            </div>

            <div class="form-group">
                <label for="TFpassword">Password: </label>
                <input id="TFpassword" name="TFpassword" class="form-control" type="text" placeholder="PASSWORD">
            </div>


            <div class="form-group">Choose the activity:
                <p>
                    <label>
                        <input name="active" value="1" type="radio" '.$active_checked.' />
                        <span>Active</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="active" value="0" type="radio" '.$inactive_checked.' />
                        <span>Inactive</span>
                    </label>
                </p>

            </div>

            <div class="form-group">Choose the role:
                <p>
                    <label>
                        <input name="role" type="radio" value="collaborateur" '.$collab_checked.' />
                        <span>Collaborateur</span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="role" type="radio" value="administrateur" '.$admin_checked.' />
                        <span>Administrateur</span>
                    </label>
                </p>
            </div>

            <button class="btn btn-success" type="submit">Register the user</button>

        </form>
    </div>
</body>
<?php include 'fragments/footer.php';?>

