<?php
class defood{
    private $conn;
    public $maLoai;
    public $tenLoai;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function read() {
        $query = "SELECT * FROM defood";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}

?>