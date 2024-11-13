<?php
// class Database
// {
//     private $host = "localhost";
//     private $username = "root";
//     private $password = "";
//     private $database = "prakwebdb";
//     public $conn;

//     public function _construct()
//     {
//         $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

//         if ($this->conn->connect_error) {
//             die("Connection failed: " . $this->conn->connect_error);
//         }
//     }
// }
class Database {
    public $conn;

    public function __construct() {
        // Attempt to connect to the MySQL database
        $this->conn = new mysqli("localhost", "root", "", "prakwebdb");

        // Check if the connection was successful
        if ($this->conn->connect_error) {
            // If there's a connection error, display the error and stop execution
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
