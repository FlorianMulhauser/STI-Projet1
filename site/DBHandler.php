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
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn->set_charset("utf8")) { 
			die("Connection failed: " . $this->conn->connect_error);
		}
        if ($this->conn->connect_error) { 
			die("Connection failed: " . $this->conn->connect_error); 
		}
        
    }
    
    public function __kill() {
        // Terminate the connection
        mysqli_close($this->conn);
    }


    public function request($sql) {
        // Execute some SQL queries
        return $this->conn->query($sql);
    }

    public function execute($sql) {
        // Insert/modify the table
        return $this->conn->exec($sql);
    }

    
}
