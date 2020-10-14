<?php 
include("fragments/DBHandler.php"); 
// initialize session
session_start();

//check if logged alrdy
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: inbox.php");
    exit;
}

$username = $password = "";
$username_err = $password_err = "";
$db = new DBHandler();


if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
       
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
        
    }
    if(!empty($username) && !empty($password)){
    
        $sql = "SELECT id,username, password FROM user WHERE username = :username AND password = :password ;";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username',$username,SQLITE3_TEXT);
        $stmt->bindValue(':password',$password,SQLITE3_TEXT);
        $result = $stmt->execute();
        $result = $stmt->fetchAll();
        print_r($result);
        
        
        
    }
}
?>
<?php include 'fragments/header.php';?>

<body>
    <div class="container">
        <div class="card purple lighten-5">
        <div class="card-content white-text">
        <form method="post"  role="form">
            <div class="form-group">
                <label for="username">Username: </label>
                <input id="username" name="username" class="form-control" type="text" placeholder="USERNAME">
                <span class="helper-text" data-error="wrong"><?php echo $username_err; ?></span>
            </div>

            <div class="form-group">
                <label for="password" class="validate">Password: </label>
                <input id="password" name="password" class="form-control" type="text" placeholder="PASSWORD">
                <span class="helper-text"><?php echo $username_err; ?></span>
            </div>
            <button class="btn btn-default" type="submit" >Log in</button>

        </form>
        </div>
        </div>
    </div>
</body>
<?php include 'fragments/footer.php';?>
