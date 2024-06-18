<?php
    class loaisp{
        private $conn;
        public $maloai; 
        public $tenloai;
        public function __construct($db) {
            $this->conn = $db;
        }
        public function read() {
            $query = "SELECT * FROM loaisp";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
    }
?>