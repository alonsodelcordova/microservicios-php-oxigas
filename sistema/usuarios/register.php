<?php
    include '../db/usuarios_db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(UsuariosDB::crearUsuario($nombre, $password, $email)){
        echo "<script>
        alert('Usuario creado correctamente');
        window.location.href = '/usuarios';
        </script>";
       
    }else{
        echo "<script>
        alert('Error al crear el usuario');
        window.location.href = '/usuarios/register.php';
        </script>";
    }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="/static/css/login.css">
</head>
<body>
    <div class="content-login">
        <div class="login-container">
            <div class="login-box">
                <h2>Registrarse</h2>
                <form action="/usuarios/register.php" method="POST">
                    <div class="input-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Registrarse</button>
                </form>
                <div class="links">
                    <a href="/usuarios">¿Ya tienes cuenta? Ingresar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>