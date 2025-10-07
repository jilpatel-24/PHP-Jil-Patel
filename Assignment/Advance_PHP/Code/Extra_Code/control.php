<?php
require_once 'model.php';

class UserController 
{
    private $model;

    public function __construct() 
	{
        $this->model = new UserProfileModel(); // No database connection needed
    }

    public function showProfile($userId) 
	{
        $userProfile = $this->model->getUserProfile($userId);
        require_once 'view.php';
    }

    public function editProfile($userId, $data) 
	{
        // Handle the profile editing logic
        $this->model->updateUserProfile($userId, $data);
        // Redirect or show a success message
    }
}
?>
