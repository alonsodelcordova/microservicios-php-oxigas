<?php

class ProductoModel extends Model {

    public static function consultarProductos($pagina, $registros_por_pagina){
        $offset = ($pagina - 1) * $registros_por_pagina;
        $conexion = Database::connect();
        $sql = "SELECT p.id, p.nombre, p.categoria, p.precio, p.url_imagen, p.usuario_id, p.fecha_registro, u.nombre as usuario
                FROM productos p
                INNER JOIN usuarios u ON p.usuario_id = u.id
                LIMIT :limit OFFSET :offset";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':limit', $registros_por_pagina, PDO::PARAM_INT);
        $resultado->bindValue(':offset', $offset, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function consultarTotalPaginas($registros_por_pagina){
        $conexion = Database::connect();
        $sql = "SELECT COUNT(*) AS total FROM productos";
        $resultado = $conexion->query($sql);
        $total_registros = $resultado->fetch(PDO::FETCH_ASSOC)['total'];
        return ceil($total_registros / $registros_por_pagina);
    }

    public static function crearProducto($nombre, $categoria, $precio, $url_imagen, $usuario_id){
        $conexion = Database::connect();
        $sql = "INSERT INTO productos (nombre, categoria, precio, url_imagen, usuario_id) 
        VALUES (:nombre, :categoria, :precio, :url_imagen, :usuario_id)";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->bindValue(':categoria', $categoria, PDO::PARAM_STR);
        $resultado->bindValue(':precio', $precio, PDO::PARAM_STR);
        $resultado->bindValue(':url_imagen', $url_imagen, PDO::PARAM_STR);
        $resultado->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
        return $resultado->execute();
    }

    public static function consultarProducto($key, $value){
        $conexion = Database::connect();
        $sql = "SELECT id, nombre, categoria, precio, url_imagen, usuario_id, fecha_registro FROM productos WHERE $key = :value";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':value', $value, PDO::PARAM_STR);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public static function eliminarProducto($id){
        $conexion = Database::connect();
        $sql = "DELETE FROM productos WHERE id = :id";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        return $resultado->execute();
    }

}