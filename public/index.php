<?php
require_once __DIR__ . '/../controllers/AuthController.php';

$action = $_GET['action'] ?? '';

$authController = new AuthController();

switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;
    default:
        header('Location: /views/login.php');
        break;
}
