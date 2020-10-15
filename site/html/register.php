<?php include("fragments/adminFilter.php");

include("fragments/DBHandler.php");

//include 'fragments/header.php';

$username = $password = $validity = $role = "";
$username_err = $password_err = $validity_err = $role_err = "";

$db = new DBHandler();

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
    if(empty(trim($_POST["TFvalidity"]))){
        $validity_err = "Please give the validity.";
    } else{
        $validity = trim($_POST["TFvalidity"]);
    }
    // Check if role is empty
    if(empty(trim($_POST["TFrole"]))){
        $role_err = "Please enter the role.";
    } else{
        $role = trim($_POST["TFrole"]);
    }

    if(!empty($username) && !empty($password) && !empty($validity) && !empty($role)){
        $sql = "INSERT INTO user (username, password, validity, role) VALUES ('".$username."', '".$password."', '".$validity."', '".$role."');";

//        $stmt = $db->prepare($sql);
//        $stmt->bindValue(':username',$username,SQLITE3_TEXT);
//        $stmt->bindValue(':password',$password,SQLITE3_TEXT);
//        $stmt->bindValue(':validity',$validity,SQLITE3_INTEGER);
//        $stmt->bindValue(':role',$role,SQLITE3_TEXT);

        // Attempt to execute the prepared statement
//        if($stmt->execute()){
//            echo "User created !";
//        } else{
//            echo "Something went wrong.";
//        }
//        // Close statement
//        unset($stmt);
//
        $db->exec($sql);
    }
//    // Close connection
//    unset($db);
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
                <input type="radio" name="TFvalidity"
                    <?php if (isset($validity) && $validity=="1") echo "checked";?>
                       value="1">Active
                <input type="radio" name="TFvalidity"
                    <?php if (isset($validity) && $validity=="0") echo "checked";?>
                       value="0">Inactive
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

