<?php
class Comment {
    private $conn;
    private $table = 'comments';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($post_id, $user_name, $content) {
        $query = "INSERT INTO " . $this->table . " (post_id, user_name, content) VALUES (:post_id, :user_name, :content)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    public function read($post_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE post_id = :post_id ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        return $stmt;
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
