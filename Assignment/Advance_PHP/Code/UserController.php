<?php

require_once 'UserModel.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    public function index() {
        $users = $this->userModel->getAllUsers();
        require 'user_list.php'; // Display the list of users
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form submission to create a new user
            $name = $_POST['name'];
            $email = $_POST['email'];
            $userId = $this->userModel->createUser($name, $email);

            if ($userId) {
                // User created successfully, redirect to the user list
                header('Location: index.php');
                exit;
            } else {
                // Handle the error (e.g., display an error message)
                echo "Error creating user.";
            }
        } else {
            // Display the create user form
            require 'user_form.php';
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $user = $this->userModel->getUserById($id);

        if ($user) {
            require 'user_form.php'; // Display the edit form, pre-filled with user data
        } else {
            // Handle the case where the user is not found (e.g., display an error)
            echo "User not found.";
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            if ($this->userModel->updateUser($id, $name, $email)) {
                // Update successful, redirect to the user list
                header('Location: index.php');
                exit;
            } else {
                // Handle the error (e.g., display an error message)
                echo "Error updating user.";
            }
        }
    }

    public function delete() {
        $id = $_GET['id'];

        if ($this->userModel->deleteUser($id)) {
            // Delete successful, redirect to the user list
            header('Location: index.php');
            exit;
        } else {
            // Handle the error (e.g., display an error message)
            echo "Error deleting user.";
        }
    }
}
