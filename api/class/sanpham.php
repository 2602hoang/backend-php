<?php
class sanpham {
    private $conn;
    
    public $id;
    public $maSp;
    public $tenSp;
    public $giaSp;
    public $maloai;
    public $hinh;
    public $soLuong;
    public $tenLoai; // To store category name
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function read() {
        try {
            $query = "SELECT s.id, s.maSp, s.tenSp, s.giaSp, s.maloai, s.hinh, s.soLuong, l.tenloai AS tenLoai
                      FROM sanpham s
                      INNER JOIN loaisp l ON s.maloai = l.maloai";
            
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
