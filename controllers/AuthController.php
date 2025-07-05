<?php
require_once _DIR_ . '/../models/User.php';

class AuthController {
    public function login() {
        session_start();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->authenticate($username, $password);

        if ($user) {
            $_SESSION['user'] = $user;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas.']);
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /views/login.php');
    }
}