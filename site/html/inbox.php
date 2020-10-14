<?php include("fragments/header.php"); ?>
<div class="container">
<h1> Inbox </h1>
<p> Here's the message you received </p>
<?php include("fragments/DBHandler.php"); 
    $db = new DBHandler();

    /**************************************
    * Load Every Message and display them     *
    **************************************/
    $result = $db->request('SELECT * FROM messages');

    foreach($result as $row) {
    echo '<div class="row">';
    echo '<div class="col s12 m12">';
        echo "<div class='card blue-grey darken-1'>";
            echo "<div class='card-content white-text'>";
                echo "<span class='card-title'>";
                    echo $row['title'] . "<br/>";
                echo "</span>";
                    echo $row['message'] . "<br/>";
                echo '<div class="card-action">';
                    echo "Time: " . $row['time'] . "<br/>";
                echo '</div>';
            echo "</div>";
        echo "</div>";     
    echo "</div>";
    echo "</div>";
    }
?>
</div>
<?php include("fragments/footer.php"); ?>
