<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

// Handle input data
if ($method == "POST" || $method == "PUT") {
    $input = json_decode(file_get_contents("php://input"), true);
}

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $sql = "SELECT * FROM products WHERE id=$id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo json_encode($result->fetch_assoc());
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Product not found"]);
            }
        } else {
            $result = $conn->query("SELECT * FROM products");
            $products = [];
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
            echo json_encode($products);
        }
        break;

    case 'POST':
        if (!isset($input['name'], $input['price'])) {
            http_response_code(400);
            echo json_encode(["error" => "Missing product name or price"]);
            break;
        }

        $name = $conn->real_escape_string($input['name']);
        $price = floatval($input['price']);
        $desc = isset($input['description']) ? $conn->real_escape_string($input['description']) : '';

        $sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$desc')";
        if ($conn->query($sql)) {
            echo json_encode(["message" => "Product created", "id" => $conn->insert_id]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Failed to create product"]);
        }
        break;

    case 'PUT':
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(["error" => "Missing product ID"]);
            break;
        }

        $id = intval($_GET['id']);
        $name = $conn->real_escape_string($input['name'] ?? '');
        $price = floatval($input['price'] ?? 0);
        $desc = $conn->real_escape_string($input['description'] ?? '');

        $sql = "UPDATE products SET name='$name', price='$price', description='$desc' WHERE id=$id";
        if ($conn->query($sql)) {
            echo json_encode(["message" => "Product updated successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Failed to update product"]);
        }
        break;

    case 'DELETE':
        if (!isset($_GET['id'])) {
            http_response_code(400);
            echo json_encode(["error" => "Missing product ID"]);
            break;
        }

        $id = intval($_GET['id']);
        $sql = "DELETE FROM products WHERE id=$id";
        if ($conn->query($sql)) {
            echo json_encode(["message" => "Product deleted successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Failed to delete product"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Invalid request method"]);
        break;
}

$conn->close();
?>
<!--
Test in Postman

{
  "name": "Laptop",
  "price": 54999,
  "description": "Powerful business laptop"
}


This Test In Postman:-

Get All Product
GET : http://localhost/php/API_Assignment/soap_rest_api/products.php

Get Single Product 
GET : http://localhost/php/API_Assignment/soap_rest_api/products.php?id=1

Update Product 
PUT: http://localhost/php/API_Assignment/soap_rest_api/products.php?id=1
Body (JSON):
{
  "name": "Laptop Pro",
  "price": 59999,
  "description": "Upgraded version"
}

Delete Product 
DELETE: http://localhost/php/API_Assignment/soap_rest_api/products.php?id=1
-->