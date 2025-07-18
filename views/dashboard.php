<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /views/login.php');
    exit;
}

echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION['user']['username']) . "</h1>";
echo "<p>Nombre: " . htmlspecialchars($_SESSION['user']['nombre']) . "</p>";
echo '<a href="/index.php?action=logout">Cerrar sesión</a>';