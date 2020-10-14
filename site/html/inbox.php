<?php include("fragments/header.php"); ?>
<body>
<h1> Inbox </h1>
<p> Here's the message you received </p>

<?php include("fragments/DBHandler.php"); 
    $db = new DBHandler();

    $db->exec("CREATE TABLE IF NOT EXISTS messages (
                        id INTEGER PRIMARY KEY, 
                        title TEXT, 
                        message TEXT, 
                        time TEXT)"); 
    // Array with some test data to insert to database             
    $messages = array(
                  array('title' => 'Hello!',
                        'message' => 'Just testing...',
                        'time' => 1327301464),
                  array('title' => 'Hello again!',
                        'message' => 'More testing...',
                        'time' => 1339428612),
                  array('title' => 'Hi!',
                        'message' => 'SQLite3 is cool...',
                        'time' => 1327214268)
                );
 
 
    /**************************************
    * Play with databases and tables      *
    **************************************/
 
    foreach ($messages as $m) {
        $formatted_time = date('Y-m-d H:i:s', $m['time']);
        $db->exec("INSERT INTO messages (title, message, time) 
                VALUES ('{$m['title']}', '{$m['message']}', '{$formatted_time}')");
    }
    
    $result = $db->request('SELECT * FROM messages');

    foreach($result as $row) {
      echo "Id: " . $row['id'] . "<br/>";
      echo "Title: " . $row['title'] . "<br/>";
      echo "Message: " . $row['message'] . "<br/>";
      echo "Time: " . $row['time'] . "<br/>";
      echo "<br/>";
    }
?>
</body>
<?php include("fragments/footer.php"); ?>
