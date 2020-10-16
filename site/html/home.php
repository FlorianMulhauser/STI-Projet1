<?php include 'fragments/header.php';?>
<?php include("filters/loginFilter.php"); ?>
<div class="card purple lighten-5">
<div class="card-content">
<!--    admin only-->
<div class="container"
    <?php
    // si !admin on cache :))))
    if(isset($_SESSION['role']) && $_SESSION['role'] == "administrateur") {
        echo ' style="visibility:visible;"';
    } else  {
        echo ' style="visibility:hidden;
        position: absolute;
top: 40px; left: 40px;
        "';
    }
    ?>
>

    <h3>Navigation to other admin only pages</h3>
    <!--    admin only-->
    <a type="button" href="/user/register.php" class="btn btn-warning">Register a new user</a>

    <!--    admin only-->
    <a type="button" href="/user/modifyUser.php" class="btn btn-warning">Modify an existing user</a>

    <!--    admin only-->
    <a type="button" href="/user/deleteUser.php" class="btn btn-warning">Delete a user</a>
</div>

<div class="container">
    <h3>Navigation to other pages</h3>

    <a type="button" href="/message/create.php" class="btn btn-primary">Create a new message</a>

    <a type="button" href="/inbox.php" class="btn btn-primary">View your inbox</a>

    <a type="button" href="/user/changePassword.php" class="btn btn-primary">Change your password</a>
</div>
</div>
</div>
<?php include 'fragments/footer.php';?>
