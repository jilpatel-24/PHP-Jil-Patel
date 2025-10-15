<?php
class Product {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM products");
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function add($name, $price, $desc) {
        $stmt = $this->db->prepare("INSERT INTO products (name, price, description) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $name, $price, $desc);
        return $stmt->execute();
    }

    public function update($id, $name, $price, $desc) {
        $stmt = $this->db->prepare("UPDATE products SET name=?, price=?, description=? WHERE id=?");
        $stmt->bind_param("sdsi", $name, $price, $desc, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
