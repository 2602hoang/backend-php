<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Include necessary files
include_once("../config/db.php");
include_once("../class/sanpham.php");
include_once("../class/loaisp.php");

// Initialize database connection
// Create a new instance of DBConnect and establish connection
$db = new db();
$connect = $db->connect();

// Create instances of sanpham and loaisp classes
$sanpham = new sanpham($connect);
$loaisp = new loaisp($connect);

// Fetch products
$stmt = $sanpham->read();

// Check if there are any products
if ($stmt->rowCount() > 0) {
    $sanphams_arr = [];
    $sanphams_arr["data"] = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $sanpham_item = array(
            "id" => $id,
            "maSp" => $maSp,
            "tenSp" => $tenSp,
            "giaSp" => $giaSp,
            
            "hinh" => $hinh,
            "soLuong" => $soLuong,
            "maloai" => $maloai,
            "tenLoai" => $tenLoai // Include category name
        );

        array_push($sanphams_arr["data"], $sanpham_item);
    }

    // Set response code - 200 OK
    http_response_code(200);

    // Show products data in JSON format
    echo json_encode($sanphams_arr);
} else {
    // Set response code - 404 Not found
    http_response_code(404);

    // Tell the user no products found
    echo json_encode(array("message" => "No products found."));
}

// Close connection
$db->closeConnection();
?>
