<?php include("fragments/header.php"); ?>
<?php include("fragments/loginFilter.php"); ?>
<div class="container">
<h1> Inbox </h1>
<p> Here's the message you received </p>
<?php include("fragments/DBHandler.php"); 
    $db = new DBHandler();

    /**************************************
    * Load Every Message and display them     *
    **************************************/
    $result = $db->request("SELECT * FROM messages WHERE receiver = '".$_SESSION["username"]."';");

    foreach($result as $row) {
    echo '<div class="row">';
    echo '<div class="col s12 m12">';
        echo "<div class='card blue-grey darken-1'>";
            echo "<div class='card-content white-text'>";
                echo "<span class='card-title'>";
                    echo "<b>".$row['title']."</b>";
                    echo " from <b>".$row['sender']. "</b><br />";
                echo "</span>";
                
                   // echo $row['message'] . "<br/>";
                echo '<div class="card-action">';
                    echo "Time: " . $row['time'] . "<br/>";
                    echo '<a class="btn-floating btn-small waves-effect waves-light green" type="submit" href="inbox.php?reply&id='.$row['id'].'"><i class="material-icons">reply</i></a>';
                    echo '<a class="btn-floating btn-small waves-effect waves-light green" type="submit" href="inbox.php?details&id='.$row['id'].'" ><i class="material-icons">arrow_downward</i></a>';
                    echo '<a href="inbox.php?delete&id='.$row['id'].'" class="btn-floating btn-small waves-effect waves-light red" type="submit" ><i class="material-icons">delete_forever</i></a>';
                    
                echo '</div>';
            echo "</div>";
        echo "</div>";     
    echo "</div>";
    echo "</div>";
    }
?>
</div>
<?php include("fragments/footer.php"); ?>
