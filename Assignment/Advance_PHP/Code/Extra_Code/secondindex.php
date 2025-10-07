<?php
require_once 'database.php';
require_once 'postcontroller.php';

$controller = new PostController($conn);

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'create') {
        $controller->create();
    } elseif ($action == 'edit') {
        $controller->edit($_GET['id']);
    } elseif ($action == 'delete') {
        $controller->delete($_GET['id']);
    } else {
        $controller->index();
    }
} else {
    $controller->index();
}
?>
