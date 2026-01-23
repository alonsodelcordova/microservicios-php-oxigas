<?php


class UsuariosModel extends Model{

    public static function consultarUsuarios($pagina, $registros_por_pagina){
        $offset = ($pagina - 1) * $registros_por_pagina;
        $conexion = Database::connect();
        $sql = "SELECT id, nombre, email, fecha_registro FROM usuarios LIMIT :limit OFFSET :offset";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':limit', $registros_por_pagina, PDO::PARAM_INT);
        $resultado->bindValue(':offset', $offset, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    

    public static function consultarTotalPaginas($registros_por_pagina){
        $conexion = Database::connect();
        $sql = "SELECT COUNT(*) AS total FROM usuarios";
        $resultado = $conexion->query($sql);
        $total_registros = $resultado->fetch(PDO::FETCH_ASSOC)['total'];
        return ceil($total_registros / $registros_por_pagina);
    }

    public static function crearUsuario($nombre, $password, $email){
        $conexion = Database::connect();
        $sql = "INSERT INTO usuarios (nombre, password, email) VALUES (:nombre, :password, :email)";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->bindValue(':password', $password, PDO::PARAM_STR);
        $resultado->bindValue(':email', $email, PDO::PARAM_STR);
        return $resultado->execute();
    }

    public static function consultarUsuarioByID($id){
        $conexion = Database::connect();
        $sql = "SELECT id, nombre, password, email, fecha_registro FROM usuarios WHERE id = :id";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public static function consultarUsuario($email){
        $conexion = Database::connect();
        $sql = "SELECT id, nombre, password, email, fecha_registro FROM usuarios WHERE email = :email";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':email', $email, PDO::PARAM_STR);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public static function eliminarUsuario($id){
        $conexion = Database::connect();
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        return $resultado->execute();
    }

}