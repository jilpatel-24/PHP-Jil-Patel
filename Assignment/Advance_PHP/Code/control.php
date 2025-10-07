<?php
// --- Controller (user_controller.php) ---
require_once 'model.php';
require_once 'view.php';

class UserController 
{
    private $model;
    private $view;

    public function __construct() 
	{
        $this->model = new UserModel();
        $this->view = new UserView();
    }

    public function listUsers() 
	{
        $users = $this->model->getUsers();
        $this->view->renderUsers($users);
    }

    public function showUser($id) 
	{
        $user = $this->model->getUser($id);
        $this->view->renderUserDetail($user);
    }
}
?>
