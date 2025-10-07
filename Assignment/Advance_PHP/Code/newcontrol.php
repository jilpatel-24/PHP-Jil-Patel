// app/controllers/UserController.php
<?php
require_once '../models/newmodel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index() {
        $users = $this->userModel->read();
        require '../views/user_list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->userModel->create($_POST['name'], $_POST['email']);
            header("Location: /");
        }
        require '../views/user_form.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->userModel->update($id, $_POST['name'], $_POST['email']);
            header("Location: /");
        }
        // Fetch the user data for pre-filling the form
        $user = $this->userModel->read()[$id];
        require '../views/user_form.php';
    }

    public function delete($id) {
        $this->userModel->delete($id);
        header("Location: /");
    }
}
?>
