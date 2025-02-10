<?php
 



class Conexion{
    private static $instancia;

    public static function conectar(){
        $HOST = $_ENV['DB_HOST'];
        $USER = $_ENV['DB_USER'];
        $PASS = $_ENV['DB_PASSWORD'];
        $DB = $_ENV['DB_NAME'];

        if(!isset(self::$instancia)){
            self::$instancia = new PDO("mysql:host=$HOST;dbname=$DB", $USER, $PASS);
            self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instancia;
    }


    public static function consultarClientes($pagina, $registros_por_pagina){
        $offset = ($pagina - 1) * $registros_por_pagina;
        $conexion = Conexion::conectar();
        $sql = "SELECT id, nombre, apellido, email, telefono, fecha_registro FROM clientes LIMIT :limit OFFSET :offset";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':limit', $registros_por_pagina, PDO::PARAM_INT);
        $resultado->bindValue(':offset', $offset, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function consultarTotalPaginas($registros_por_pagina){
        $conexion = Conexion::conectar();
        $sql = "SELECT COUNT(*) AS total FROM clientes";
        $resultado = $conexion->query($sql);
        $total_registros = $resultado->fetch(PDO::FETCH_ASSOC)['total'];
        return ceil($total_registros / $registros_por_pagina);
    }


    public static function crearCliente($nombre, $apellido, $email, $telefono){
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO clientes (nombre, apellido, email, telefono, fecha_registro) VALUES (:nombre, :apellido, :email, :telefono, :fecha_registro)";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $resultado->bindValue(':email', $email, PDO::PARAM_STR);
        $resultado->bindValue(':telefono', $telefono, PDO::PARAM_STR);
        $resultado->bindValue(':fecha_registro', date('Y-m-d H:i:s'), PDO::PARAM_STR);
        return $resultado->execute();
    }

    public static function consultarCliente($id){
        $conexion = Conexion::conectar();
        $sql = "SELECT id, nombre, apellido, email, telefono, fecha_registro FROM clientes WHERE id = :id";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public static function eliminarCliente($id){
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM clientes WHERE id = :id";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        return $resultado->execute();
    }

}



