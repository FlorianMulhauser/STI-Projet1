
<?php include("fragments/adminFilter.php");


include("fragments/DBHandler.php");



$username = $password = $validity = $role = $id =  "";
$username_err = $password_err = $validity_err = $role_err = $username_not_found ="";
$inactive_checked = $active_checked = $admin_checked = $collab_checked = "";
$db = new DBHandler();
if(isset($_GET['notFound'])) {
    $username_not_found = "user <b>".$_GET['notFound']."</b> doesn't exist";
}
if(empty($_GET['TFusername'])) {
        $username_err = "Please enter username.";
    } else{
        $username = $_GET["TFusername"];
        
        $sql = "SELECT * FROM user WHERE username = '".$username."';";
        $result = $db->request($sql)->fetch();
        // assign existing values of the user
        $id = $result['id'];
        $password = $result['password'];
        $validity = $result['validity'];
        
        $role = $result['role'];
        
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
     
    }
        
    
    
if($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET" ){
    
    
    // Check if password is empty
    if(empty(trim(isset($_POST["TFpassword"])))){
        $password_err = "Please enter password.";
    } else{
        $password = trim($_POST["TFpassword"]);
    }
    // Check if validity is empty
    if(empty(trim(isset($_POST["active"])))){
        $validity_err = "Please give the validity.";
    } else{
        $validity = trim($_POST["active"]);
    }
    // Check if role is empty
    if(empty(trim(isset($_POST["role"])))){
        $role_err = "Please enter the role.";
    } else{
        $role = trim($_POST["role"]);
    }

   
    
    if($_SERVER["REQUEST_METHOD"] == "POST" ) {
    
    $username =$_GET['username']; 
    $id = $_GET['id'];
    if(!empty($username) && !empty($password) && !empty($validity) && !empty($role)) {
    
            $sqlUpdate = "UPDATE user SET password = '".$password."' , validity = '".$validity."', role = '".$role."' WHERE id = '".$id."';";
            $db->exec($sqlUpdate);
            header("location modifyUser.php");
            exit;
            }
        
    }

}

?>
<?php include("fragments/header.php"); ?>
<body>

<div class="container">
<div class="card light-grey">
<div class="card-content">
<?php if(empty($username)) { 
    echo ' <span class="card-title"> Modify a user here, search an user first. </span>
    
    <form action="modifyUser.php?uid=<?php echo uniqid()?>" role="form" method="get">
        <div class="form-group">
            
            <label for="TFusername">Username: </label>
            <?php  echo $username ?>
            <input id="TFusername" name="TFusername" class="form-control" type="text" placeholder="USERNAME">
        </div>

        <button class="btn btn-default" type="submit">Find the user</button>

    </form>
    '; } ?>
    <?php 
if(!empty($username) && isset($id)) {
echo "Modifiy the user <b>".$username."</b></br>";
echo '
    <form action="modifyUser.php?username='.$username.'&id='.$id.'" role="form" method="post">
        <p> Change this user parameters <p>
        <div class="form-group">
        <label for="TFusername">Username: </label>
            <input id="TFusername" name="TFusername" class="form-control" type="text" value="'.$username.'">
            <label for="TFpassword">Password: </label>
            <input id="TFpassword" name="TFpassword" class="form-control" type="text" value="'.$password.'">
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

        <button class="btn btn-warning" type="submit">Save changes</button>
    </form>
'; } else if( !isset($id) && !empty($username)) {
header("location: modifyUser.php?notFound=".$username); } 
?>
<?php echo $username_not_found ?>
</div>
</div>
</div>
</body>
<?php include 'fragments/footer.php';?>

