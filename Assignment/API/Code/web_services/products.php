<?php
header("Content-Type: application/json; charset=UTF-8");
include 'db.php';

// Parse URL parameter like ?id=2
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

try {
    if ($id > 0) 
	{
        // Fetch single product
        $stmt = $conn->prepare("SELECT * FROM product WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) 
		{
            echo json_encode($result->fetch_assoc());
        } 
		else 
		{
            http_response_code(404);
            echo json_encode(["error" => "Product not found"]);
        }
    } 
	else 
	{
        // Fetch all products
        $result = $conn->query("SELECT * FROM product");
        $products = [];
        while ($row = $result->fetch_assoc()) 
		{
            $products[] = $row;
        }
        echo json_encode($products);
    }
} 
catch (Exception $e) 
{
    http_response_code(500);
    echo json_encode(["error" => "Internal Server Error"]);
}
?>

<!--
Use Postman:

For get All Product
GET  http://localhost/php/API_Assignment/web_services/products.php

For get single 
GET http://localhost/php/API_Assignment/web_services/products.php?id=2

-->