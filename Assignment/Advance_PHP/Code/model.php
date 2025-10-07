<?php
// --- Model (user_model.php) ---
class UserModel {
    private $users = [
        1 => ['name' => 'Alice', 'email' => 'alice@example.com'],
        2 => ['name' => 'Bob', 'email' => 'bob@example.com'],
    ];

    public function getUsers() {
        return $this->users;
    }

    public function getUser($id) {
        return $this->users[$id] ?? null;
    }
}
?>
