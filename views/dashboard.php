<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /views/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body id="body-dashboard">
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']['username']); ?></h1>
    <div class="dashboard-links">
        <a href="profile.php">Ver Mi Perfil</a> |
        <a href="../public/index.php?action=logout">Cerrar sesión</a>
    </div>
</body>
</html>