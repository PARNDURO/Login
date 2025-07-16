<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form id="loginForm">
        <input type="text" name="username" placeholder="Usuario" required><br>
        <br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <br>
        <button type="submit">Entrar</button>
    </form>
    <div id="message" style="color: red;"></div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="../public/js/login.js"></script>
</body>
</html>