<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <button type="button" id="btn-register" onclick="window.location.href='../views/register.php'">Registrarse</button>
        <!--<button type="button" >Forgotten password</button>-->
<a href ="">forgot password</a>
    </form>
    <div id="message" style="color: red;"></div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="../public/js/login.js"></script>
</body>
</html>