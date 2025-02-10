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

    public static function consultarUsuarios($pagina, $registros_por_pagina){
        $offset = ($pagina - 1) * $registros_por_pagina;
        $conexion = Conexion::conectar();
        $sql = "SELECT id, nombre, email, fecha_registro FROM usuarios LIMIT :limit OFFSET :offset";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':limit', $registros_por_pagina, PDO::PARAM_INT);
        $resultado->bindValue(':offset', $offset, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    

    public static function consultarTotalPaginas($registros_por_pagina){
        $conexion = Conexion::conectar();
        $sql = "SELECT COUNT(*) AS total FROM usuarios";
        $resultado = $conexion->query($sql);
        $total_registros = $resultado->fetch(PDO::FETCH_ASSOC)['total'];
        return ceil($total_registros / $registros_por_pagina);
    }

    public static function crearUsuario($nombre, $password, $email){
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO usuarios (nombre, password, email) VALUES (:nombre, :password, :email)";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->bindValue(':password', $password, PDO::PARAM_STR);
        $resultado->bindValue(':email', $email, PDO::PARAM_STR);
        return $resultado->execute();
    }

    public static function consultarUsuarioByID($id){
        $conexion = Conexion::conectar();
        $sql = "SELECT id, nombre, password, email, fecha_registro FROM usuarios WHERE id = :id";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public static function consultarUsuario($email){
        $conexion = Conexion::conectar();
        $sql = "SELECT id, nombre, password, email, fecha_registro FROM usuarios WHERE email = :email";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':email', $email, PDO::PARAM_STR);
        $resultado->execute();
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    public static function eliminarUsuario($id){
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $resultado = $conexion->prepare($sql);
        $resultado->bindValue(':id', $id, PDO::PARAM_INT);
        return $resultado->execute();
    }



}