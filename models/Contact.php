<?php
class Contact {
    private $conn;
    private $table_name = "contactos";

    public $id;
    public $nombre;
    public $telefono;
    public $email;
    public $direccion;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getContacts() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getContact($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createContact() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, telefono, email, direccion) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);

        $this->sanitize();

        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->telefono);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $this->direccion);

        return $stmt->execute();
    }

    public function updateContact() {
        $query = "UPDATE " . $this->table_name . " SET nombre = ?, telefono = ?, email = ?, direccion = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $this->sanitize();

        $stmt->bindParam(1, $this->nombre);
        $stmt->bindParam(2, $this->telefono);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $this->direccion);
        $stmt->bindParam(5, $this->id);

        return $stmt->execute();
    }

    public function deleteContact() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }

    private function sanitize() {
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->telefono = htmlspecialchars(strip_tags($this->telefono));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->direccion = htmlspecialchars(strip_tags($this->direccion));
    }
}
?>
