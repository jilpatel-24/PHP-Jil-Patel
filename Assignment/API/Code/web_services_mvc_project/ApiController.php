<?php
header("Content-Type: application/json");

require_once "../app/core/Database.php";
require_once "../app/models/User.php";
require_once "../app/models/Product.php";

$method = $_SERVER['REQUEST_METHOD'];
$path = $_GET['path'] ?? '';

switch ($path) {

    // ---------- USER AUTH ----------
    case "user/register":
        if ($method === "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            $user = new User();
            if ($user->register($data['name'], $data['email'], $data['password'])) {
                echo json_encode(["message" => "User registered successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["error" => "Registration failed"]);
            }
        }
        break;

    case "user/login":
        if ($method === "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            $user = new User();
            $result = $user->login($data['email'], $data['password']);
            if ($result) {
                echo json_encode(["message" => "Login successful", "user" => $result]);
            } else {
                http_response_code(401);
                echo json_encode(["error" => "Invalid credentials"]);
            }
        }
        break;

    // ---------- PRODUCT CRUD ----------
    case "product":
        $product = new Product();

        if ($method === "GET") {
            if (isset($_GET['id'])) {
                $data = $product->getById($_GET['id']);
                echo json_encode($data->fetch_assoc() ?: ["error" => "Product not found"]);
            } else {
                $result = $product->getAll();
                $list = [];
                while ($row = $result->fetch_assoc()) $list[] = $row;
                echo json_encode($list);
            }
        }

        if ($method === "POST") {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($product->add($data['name'], $data['price'], $data['description'])) {
                echo json_encode(["message" => "Product added successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["error" => "Failed to add product"]);
            }
        }

        if ($method === "PUT") {
            $data = json_decode(file_get_contents("php://input"), true);
            if ($product->update($data['id'], $data['name'], $data['price'], $data['description'])) {
                echo json_encode(["message" => "Product updated successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["error" => "Failed to update product"]);
            }
        }

        if ($method === "DELETE") {
            parse_str(file_get_contents("php://input"), $data);
            if ($product->delete($data['id'])) {
                echo json_encode(["message" => "Product deleted successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["error" => "Failed to delete product"]);
            }
        }
        break;

    default:
        http_response_code(404);
        echo json_encode(["error" => "Invalid endpoint"]);
}
?>
