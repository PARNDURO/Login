<?php
require_once __DIR__ . '/../config/db.php';

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function authenticate($username, $password) {
        if (!$this->conn) {
            return false;
        }
        
        try {
            $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Comparación de contraseña en texto plano (solo para pruebas)
            if ($user && $password === $user['password']) {
                return $user;
            }

            return false;
        } catch (PDOException $e) {
            error_log("Error en autenticación: " . $e->getMessage());
            return false;
        }
    }
}