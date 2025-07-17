<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login() {
        session_start();
        
        header('Content-Type: application/json');

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            echo json_encode(['success' => false, 'message' => 'Usuario y contraseña son requeridos.']);
            return;
        }

        try {
            $userModel = new User();
            $user = $userModel->authenticate($username, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas.']);
            }
        } catch (Exception $e) {
            error_log("Error en login: " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Error en el servidor. Intenta más tarde.']);
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /views/login.php');
    }
}