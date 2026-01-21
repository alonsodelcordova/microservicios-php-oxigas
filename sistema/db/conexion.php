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

}



