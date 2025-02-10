<?php
include 'db/conexion.php';

if(isset($_GET['id']))
{
    $cliente = Conexion::consultarUsuarioByID($_GET['id']);
    if($cliente){
        Conexion::eliminarUsuario($_GET['id']);
        echo "<script>alert('Usuario eliminado');</script>";
    }else{
        echo "<script>alert('Usuario no encontrado');</script>";
    }
}else{
    echo "<script>alert('ID de usuario no proporcionado');</script>";
}
echo "<script>window.location.href = '/usuarios/listado.php';</script>";
exit;