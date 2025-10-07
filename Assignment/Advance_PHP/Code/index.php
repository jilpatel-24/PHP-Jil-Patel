<?php
// --- index.php (or any entry point) ---
require_once 'control.php';

$controller = new UserController();

// Example usage:
if (isset($_GET['action'])) 
{
    if ($_GET['action'] == 'list') 
	{
        $controller->listUsers();
    } 
	elseif ($_GET['action'] == 'show' && isset($_GET['id'])) 
	{
        $controller->showUser($_GET['id']);
    } 
	else 
	{
        echo "<p>Invalid action.</p>";
    }
} 
else 
{
    echo "<p>Welcome! Use the 'list' action to see users, or 'show' with a user ID (e.g., ?action=show&id=1).</p>";
}
?>
