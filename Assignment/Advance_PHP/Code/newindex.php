// public/index.php
<?php
require_once '../app/controllers/newcontrol.php';

$controller = new UserController();

if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
    $action = $_GET['action'];
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $controller->$action($id);
} else {
    $controller->index(); // default action
}
?>
