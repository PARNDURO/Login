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
            $query = "SELECT id, username, password, nombre, apellido, create_at FROM users WHERE username = :username LIMIT 1";
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

    public function getUserProfile($userId) {
        if (!$this->conn) {
            return false;
        }
        
        try {
            $query = "SELECT id, username, nombre, apellido, edad FROM users WHERE id = :id LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $userId);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user ?: false;
        } catch (PDOException $e) {
            error_log("Error al obtener perfil de usuario: " . $e->getMessage());
            return false;
        }
    }

    public function getAllUsers() {
        if (!$this->conn) {
            return false;
        }
        
        try {
            $query = "SELECT id, username, nombre, apellido, edad FROM users";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener usuarios: " . $e->getMessage());
            return false;
        }
    }

    public function createUser($username, $password, $nombre, $apellido, $edad) {
        if (!$this->conn) {
            return false;
        }
        try {
            $query = "INSERT INTO users (username, password, nombre, apellido, edad) VALUES (:username, :password, :nombre, :apellido, :edad)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->bindParam(":edad", $edad);
            
            return $stmt->execute();
        } catch (\Throwable $th) {
           error_log("Error al crear usuario: " . $th->getMessage());
           return false;
        }
    }
}