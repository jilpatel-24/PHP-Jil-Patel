<?php
// Include the controller
require_once 'control.php';

// Determine the action (e.g., from the URL)
$action = $_GET['action'] ?? 'show'; // Default action is 'show'
$userId = $_GET['id'] ?? 1; // Default user ID is 1

// Instantiate the controller
$userController = new UserController();

// Route the request
switch ($action) 
{
    case 'show':
        $userController->showProfile($userId);
        break;
    case 'edit':
        // Handle edit action (you would typically get data from a form)
        $data = ['username' => 'new_username', 'email' => 'new_email@example.com'];
        $userController->editProfile($userId, $data);
        break;
    default:
        echo "404 Not Found"; // Or handle the error appropriately
        break;
}
?>
