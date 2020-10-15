<?php include("fragments/adminFilter.php");


include("fragments/DBHandler.php");

//include 'fragments/header.php';

$username = $password = $validity = $role = "";
$username_err = $password_err = $validity_err = $role_err = "";

$db = new DBHandler();

if($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET"){

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

    if(!empty($username)){
        $sql = "SELECT * FROM user WHERE username = '".$username."';";
        $result = $db->request($sql)->fetch();

        // assign existing values of the user
        $password = $result['password'];
        $validity = $result['validity'];
        $role = $result['role'];
    }

    if(!empty($username) && !empty($password) && !empty($validity) && !empty($role)){
        if(empty($username_err) && empty($validity_err) && empty($password_err) && empty($role_err)){
            $sqlUpdate = "UPDATE user SET (password, validity, role) VALUES ('".$password."', '".$validity."', '".$role."')  WHERE username = '".$username."';";

            $db->exec($sqlUpdate);
            echo "Updated !";
            exit;
        } else {

            echo "an error ocurred";
        }
    }

}

?>

<h1> Hello there admin ! </h1>
<body>
<h3> Modify a user here</h3>
<div class="container">

    <form action="modifyUser.php?uid=<?php echo uniqid()?>" role="form" method="get">
        <div class="form-group">
            <h3>Search the user to modify by giving the username</h3>
            <label for="TFusername">Username: </label>
            <?php  echo $username ?>
            <input id="TFusername" name="TFusername" class="form-control" type="text" placeholder="USERNAME">
        </div>

        <button class="btn btn-default" type="submit">Find the user</button>

    </form>
    <form action="modifyUser.php" role="form" method="post">
        <h3> Change this user parameters </h3>
        <div class="form-group">
            <label for="TFpassword">Password: </label>
            <?php  echo $password ?>
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

        <button class="btn btn-warning" type="submit">Save changes</button>
    </form>
</div>
</body>
<?php //include 'fragments/footer.php';?>

