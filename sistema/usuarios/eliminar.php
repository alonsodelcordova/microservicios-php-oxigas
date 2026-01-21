<?php
    include '../db/usuarios_db.php';
if(isset($_GET['id']))
{
    $cliente = UsuariosDB::consultarUsuarioByID($_GET['id']);
    if($cliente){
        UsuariosDB::eliminarUsuario($_GET['id']);
        echo "<script>alert('Usuario eliminado')</script>";
    }else{
        echo "<script>alert('Usuario no encontrado');</script>";
    }
}else{
    echo "<script>alert('ID de usuario no proporcionado');</script>";
}
echo "<script>window.location.href = '/usuarios/listado.php';</script>";
exit;