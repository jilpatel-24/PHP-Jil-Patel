<?php

require_once 'UserController.php';

// Database connection (replace with your actual database credentials)
$host = 'localhost';
$dbname = 'your_database_name';
$username = 'your_username';
$password = 'your_password';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$userController = new UserController($db);

// Routing
$action = $_GET['action'] ?? 'index'; // Default action is 'index' (list users)

switch ($action) {
    case 'index':
        $userController->index();
        break;
    case 'create':
        $userController->create();
        break;
    case 'edit':
        $userController->edit();
        break;
    case 'update':
        $userController->update();
        break;
    case 'delete':
        $userController->delete();
        break;
    default:
        // Handle invalid actions (e.g., show a 404 error)
        echo "Invalid action.";
        break;
}
