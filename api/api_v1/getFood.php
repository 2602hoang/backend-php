<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Include necessary files
include_once("../config/db.php");
include_once("../class/food.php");
include_once("../class/defood.php");

// Initialize database connection
$db = new db();
$connect = $db->connect();

// Create instances of food and defood classes
$food = new food($connect);
$defood = new defood($connect);

// Fetch products
$stmt = $food->read();

// Check if there are any products
if ($stmt->rowCount() > 0) {
    $foods_arr = [];
    $foods_arr["data"] = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Ensure all required fields are present
        $id = $row['id'] ?? null;
        $food_name = $row['food'] ?? null;
        $giaSp1 = $row['giaSp1'] ?? null;
        $hinhSp = $row['hinhSp'] ?? null;
        $create_at = $row['create_at'] ?? null;
        $update_at = $row['update_at'] ?? null;
        $soLuong1 = $row['soLuong1'] ?? null;
        $maLoai = $row['maLoai'] ?? null;
        $tenLoai = $row['tenLoai'] ?? null;

        // Build the food item array
        $food_item = array(
            "id" => $id,
            "food" => $food_name,
            "giaSp1" => $giaSp1,
            "hinhSp" => $hinhSp,
            "create_at" => $create_at,
            "update_at" => $update_at,
            "soLuong1" => $soLuong1,
            "maLoai" => $maLoai,
            "tenLoai" => $tenLoai
        );

        array_push($foods_arr["data"], $food_item);
    }

    // Set response code - 200 OK
    http_response_code(200);

    // Show products data in JSON format
    echo json_encode($foods_arr);
} else {
    // Set response code - 404 Not found
    http_response_code(404);

    // Tell the user no products found
    echo json_encode(array("message" => "No products found."));
}

// Close connection
$db->closeConnection();
?>
