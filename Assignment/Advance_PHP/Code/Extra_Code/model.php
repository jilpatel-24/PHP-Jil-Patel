<?php
class UserProfileModel {
    private $users = [];

    public function __construct() {
        // Sample data
        $this->users = [
            1 => ['id' => 1, 'username' => 'JIL PATEL', 'email' => 'jp@gmail.com'],
            2 => ['id' => 2, 'username' => 'jane_doe', 'email' => 'jane@example.com'],
        ];
    }

    public function getUserProfile($userId) {
        return $this->users[$userId] ?? null; // Return null if user not found
    }

    public function updateUserProfile($userId, $data) {
        if (isset($this->users[$userId])) {
            $this->users[$userId] = array_merge($this->users[$userId], $data);
            return true;
        }
        return false; // Return false if user not found
    }
}
?>
