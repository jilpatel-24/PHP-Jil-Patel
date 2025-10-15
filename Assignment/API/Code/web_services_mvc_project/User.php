<?php
class User {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function register($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hash);
        return $stmt->execute();
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && password_verify($password, $result['password'])) {
            return $result;
        }
        return false;
    }
}
?>
