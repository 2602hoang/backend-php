<?php
// DBConnect.php

class db {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "qlsp";
    private $conn;

    // Method to establish the database connection
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Uncomment the line below if you want to see a success message
            // echo "Connected successfully";
        } catch(PDOException $exception) {
            echo "Connection failed: " . $exception->getMessage();
        }
        return $this->conn;
    }

    // Method to close the database connection
    public function closeConnection() {
        $this->conn = null;
    }
}
?>