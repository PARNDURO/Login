<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /views/login.php');
    exit;
}

echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION['user']['username']) . "</h1>";

echo '<div class="dashboard-links">';
echo '<a href="profile.php">Ver Mi Perfil</a> | ';
echo '<a href="../public/index.php?action=logout">Cerrar sesión</a>';
echo '</div>';