<?php
header("Content-Type: application/json");
include 'db.php';

$method = $_SERVER['REQUEST_METHOD'];
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Helper: send response
function send_response($data, $code=200){
    http_response_code($code);
    echo json_encode($data);
    exit;
}

switch ($method) {

    // GET: retrieve product(s)
    case 'GET':
        if ($id > 0) {
            $stmt = $conn->prepare("SELECT * FROM product WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();
            if ($result) send_response($result);
            else send_response(["error" => "Product not found"], 404);
        } else {
            $result = $conn->query("SELECT * FROM product");
            $products = [];
            while($row = $result->fetch_assoc()) $products[] = $row;
            send_response($products);
        }
        break;

    // POST: create new product
    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['name'], $data['price'])) send_response(["error"=>"Missing fields"],400);

        $stmt = $conn->prepare("INSERT INTO product (name, price, description) VALUES (?,?,?)");
        $stmt->bind_param("sds", $data['name'], $data['price'], $data['description']);
        if($stmt->execute()) send_response(["message"=>"Product created","id"=>$conn->insert_id],201);
        else send_response(["error"=>"Failed to create product"],500);
        break;

    // PUT: update product
    case 'PUT':
        if ($id == 0) send_response(["error"=>"Missing product ID"],400);
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $conn->prepare("UPDATE product SET name=?, price=?, description=? WHERE id=?");
        $stmt->bind_param("sdsi", $data['name'], $data['price'], $data['description'], $id);
        if($stmt->execute()) send_response(["message"=>"Product updated"]);
        else send_response(["error"=>"Failed to update"],500);
        break;

    // DELETE: remove product
    case 'DELETE':
        if ($id == 0) send_response(["error"=>"Missing product ID"],400);
        $stmt = $conn->prepare("DELETE FROM product WHERE id=?");
        $stmt->bind_param("i",$id);
        if($stmt->execute()) send_response(["message"=>"Product deleted"]);
        else send_response(["error"=>"Failed to delete"],500);
        break;

    default:
        send_response(["error"=>"Method not allowed"],405);
}
?>
<!--
Use Postman

Create product (INSERT):
POST http://localhost/php/API_Assignment/Implement_RESTful_principles/products.php

Body (JSON):
{
  "name": "Gaming Mouse",
  "price": 1499.00,
  "description": "RGB Mouse with extra buttons"
}

Update product (UPDATE):
PUT http://localhost/php/API_Assignment/Implement_RESTful_principles/products.php?id=1
Body (JSON):
{
  "name": "Updated Watch",
  "price": 3599.00,
  "description": "Updated version"
}
-->