<?php
require_once '../config/database.php';
require_once '../controllers/PostController.php';

$controller = new PostController($conn);
$controller->addComment();
?>
