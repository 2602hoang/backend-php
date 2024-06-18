<?php

class food {private $conn;
    
    public $id;
    public $food;
    public $giaSp1;
    public $maLoai;
    public $hinhSp;
    public $create_at;
    public $update_at;
    public $soLuong1;
    public $tenLoai; // To store category name
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function read() {
        try {
            $query = "SELECT s.id, s.food, s.giaSp1, s.maLoai, s.hinhSp,s.create_at, s.update_at, s.soLuong1, l.tenloai AS tenLoai
                      FROM food s
                      INNER JOIN defood l ON s.maLoai = l.maLoai";
            
            // Prepare the query statement
            $stmt = $this->conn->prepare($query);
            
            // Execute query
            $stmt->execute();
            
            return $stmt;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null; // Return null on error
        }
    }
}
?>