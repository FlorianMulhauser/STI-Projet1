<footer class="page-footer blue accent-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Navigation </h5>
                <p class="grey-text text-lighten-4">Liste des liens pour naviguer sur le site</p>


            </div>
            <div class="col l3 s12" 
            <?php 
            // si !admin on cache :))))
            if(isset($_SESSION['role']) && $_SESSION['role'] == "administrateur") {
                echo ' style="visibility:visible;"';
            } else  {
                echo ' style="visibility:hidden;"';
            }
            ?> 
            >
            
                <h5 class="white-text" >Administation</h5>
                <ul>
                    <li><a class="white-text" href="/user/deleteUser.php">Delete a User</a></li>
                    <li><a class="white-text" href="/user/modifyUser.php">Modify a User</a></li>
                    <li><a class="white-text" href="/user/register.php">Create User</a></li>
                    <li><a class="white-text" href="/user/changePassword.php">Change your Password</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Application</h5>
                <ul>
                    <li><a class="white-text" href="/inbox.php">Inbox</a></li>
                    <li><a class="white-text" href="/logout.php">logout</a></li>
                    <li><a class="white-text" href="/message/create.php">New Message</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
    
        <div class="container">
            Made by Robin Cuénoud & Florian Mülhauser <span style="margin-left: 35%;">
         <?php if(isset($_SESSION['username']) ) {
                echo ' logged in as <b>'.$_SESSION['username'].' </b> ';
            } 
            ?>
        </span>
        </div>
       
    </div>
     
</footer>


</body>
</html>
