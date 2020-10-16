<?php

class DBHandler
{
    private $conn;
    // Database parameters
    private $servername = "127.0.0.1";
    private $dbname = "Database 1";
    private $username = "root";
    private $password = "root";
 

    public function __construct(){
        // Init connection
        $this->conn = new PDO('sqlite:/usr/share/nginx/databases/database.sqlite');
    }
    
    public function __destruct() {
        // Terminate the connection
        $this->conn = null;
    }


    public function request($sql) {
        // Execute some SQL queries
        return $this->conn->query($sql);
    }
    
    public function exec($sql)  {
        $this->conn->exec($sql);
    }
    
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }
    
} 
