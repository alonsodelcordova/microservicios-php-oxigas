<?php


class ClienteModel extends Model {


    public static function consultarClientes($pagina, $registros_por_pagina){
        $offset = ($pagina - 1) * $registros_por_pagina;
        $conexion = Database::connect();
        $sql = "SELECT id, nombre, apellido, email, telefono, fecha_registro FROM clientes LIMIT :limit OFFSET :offset";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':limit', $registros_por_pagina, PDO::PARAM_INT);
        $resultado->bindValue(':offset', $offset, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function consultarTotalPaginas($registros_por_pagina){
        $conexion = Database::connect();
        $sql = "SELECT COUNT(*) AS total FROM clientes";
        $resultado = $conexion->query($sql);
        $total_registros = $resultado->fetch(PDO::FETCH_ASSOC)['total'];
        return ceil($total_registros / $registros_por_pagina);
    }


    public static function crearCliente($nombre, $apellido, $email, $telefono){
        $conexion = Database::connect();
        $sql = "INSERT INTO clientes (nombre, apellido, email, telefono) VALUES (:nombre, :apellido, :email, :telefono)";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $resultado->bindValue(':email', $email, PDO::PARAM_STR);
        $resultado->bindValue(':telefono', $telefono, PDO::PARAM_STR);
        return $resultado->execute();
    }

    public static function consultarCliente($id){
        $conexion = Database::connect();
        $sql = "SELECT id, nombre, apellido, email, telefono, fecha_registro FROM clientes WHERE id = :id";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public static function eliminarCliente($id){
        $conexion = Database::connect();
        $sql = "DELETE FROM clientes WHERE id = :id";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        return $resultado->execute();
    }
}