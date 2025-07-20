<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Registro</h2>
    <form id="registerForm">
        <input type="text" name="username" placeholder="Usuario" required><br>
        <br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <br>
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <br>
        <input type="text" name="apellido" placeholder="Apellido" required><br>
        <br>
        <input type="number" name="edad" placeholder="Edad" required><br>
        <br>
        <button id="btn-register"   type="submit">Registrarse</button>
    </form>
    <script src="../public/js/register.js"></script>
</body>
</html>