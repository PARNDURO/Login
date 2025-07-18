<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Mi Perfil</h1>
        
        <div id="profileData">
            <p>Cargando datos...</p>
        </div>
        
        <div id="message" style="color: red;"></div>
        
        <div class="buttons">
            <button onclick="loadProfile()">Recargar Perfil</button>
            <button onclick="loadAllUsers()">Ver Todos los Usuarios</button>
            <a href="dashboard.php">Volver al Dashboard</a>
            <button id ="btn-close" class="btn btn-danger" href="../public/index.php?action=logout">Cerrar Sesión</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function() {
            loadProfile();
        });

        function loadProfile() {
            $.ajax({
                url: '../public/index.php?action=getProfile',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        const user = response.data;
                        $('#profileData').html(`
                            <div class="profile-card">
                                <h2>Datos Personales</h2>
                                <p><strong>ID:</strong> ${user.id}</p>
                                <p><strong>Usuario:</strong> ${user.username}</p>
                                <p><strong>Nombre:</strong> ${user.nombre || 'No especificado'}</p>
                                <p><strong>Apellido:</strong> ${user.apellido || 'No especificado'}</p>
                                <p><strong>Edad:</strong> ${user.edad || 'No especificada'}</p>
                            </div>
                        `);
                        $('#message').text('');
                    } else {
                        $('#message').text(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText);
                    $('#message').text('Error al cargar el perfil');
                }
            });
        }

        function loadAllUsers() {
            $.ajax({
                url: '../public/index.php?action=getAllUsers',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        const users = response.data;
                        let usersHtml = '<div class="users-list"><h2>Todos los Usuarios</h2>';
                        
                        users.forEach(function(user) {
                            usersHtml += `
                                <div class="user-item">
                                    <p><strong>ID:</strong> ${user.id}</p>
                                    <p><strong>Usuario:</strong> ${user.username}</p>
                                    <p><strong>Nombre:</strong> ${user.nombre || 'No especificado'}</p>
                                    <p><strong>Apellido:</strong> ${user.apellido || 'No especificado'}</p>
                                    <p><strong>Edad:</strong> ${user.edad || 'No especificada'}</p>
                                    <hr>
                                </div>
                            `;
                        });
                        
                        usersHtml += '</div>';
                        $('#profileData').html(usersHtml);
                        $('#message').text('');
                    } else {
                        $('#message').text(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText);
                    $('#message').text('Error al cargar los usuarios');
                }
            });
        }
    </script>
</body>
</html> 