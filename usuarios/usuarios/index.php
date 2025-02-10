<?php
include "db/conexion.php";

session_start();

if(isset($_SESSION['email'])){
    echo "<script>
    window.location.href = '/usuarios/listado.php';
    </script>";
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $resultado = Conexion::consultarUsuario($username);
    if($resultado!=null){
        if($password == $resultado['password']){
            $_SESSION['email'] = $username;
            echo "<script>
            alert('Inicio de sesión exitoso');
            window.location.href = '/usuarios/listado.php';
            </script>";
        }else{
            echo "<script>
            alert('Contraseña incorrecta');
            window.location.href = '/usuarios';
            </script>";
        }
    }else{
        echo "<script>
        alert('Usuario o contraseña incorrectos');
        window.location.href = '/usuarios';
        </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/usuarios/static/css/login.css">
</head>
<body>
    <div class="content-login">
        <div class="login-container">
            <div class="login-box">
                <h2>Iniciar Sesión</h2>
                <form action="/usuarios" method="POST">
                    <div class="input-group">
                        <label for="username">Usuario</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Ingresar</button>
                </form>
                <div class="links">
                    <a href="/usuarios/forgot-password.php">¿Olvidaste tu contraseña?</a>
                    <a href="/usuarios/register.php">Regístrate</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>