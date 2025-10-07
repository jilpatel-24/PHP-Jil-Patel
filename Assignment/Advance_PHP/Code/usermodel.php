<?php

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db; // Assuming $db is a PDO database connection
    }

    // Create (Insert)
    public function createUser($name, $email) {
        $stmt = $this->db->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        return $this->db->lastInsertId(); // Return the ID of the newly created user
    }

    // Read (Get all users - already present)
    public function getAllUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read (Get a single user by ID - useful for Update and Delete)
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function updateUser($id, $name, $email) {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]); // Returns true on success, false on failure
    }

    // Delete
    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]); // Returns true on success, false on failure
    }
}

